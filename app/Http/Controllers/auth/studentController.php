<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\changePasswordRequest;
use App\Http\Requests\editInfo;
use App\Http\Requests\LoginRequest;
use App\Models\ChuyenNganh;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    public function login(){
        // save role to session
        session(['role' => 'student']);
        return view('auth.login', ['role' => 'student']);
    }
    public function loginProcess(LoginRequest $request){
        // delete role from session
        $request->session()->forget('role');
        // login process by auth
        $email = $request->username;

        // split email to username 
        $username = explode('@st', $email)[0];
        $password = $request->password;

        $admin = SinhVien::where('ma_sinh_vien', $email)->first();
        if($admin){
            // check password
            if(password_verify($password, $admin->password)){
                // save admin to auth session
                Auth::guard('student')->login($admin);
                return redirect()->route('student.info.index');
            }else{
                // password wrong
                // save email to session 
                $request->session()->flash('email', $email);
                return redirect()->back()->with('error', 'Mật khẩu không đúng');
            }
        }else{
            // email wrong
            return redirect()->back()->with('error', 'Email không tồn tại');
        }
    }

    public function logout(){
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }
    
    public function forgotPassword(){
        return view('auth.forgot-password', ['role' => 'student']);
    }
    public function forgotPasswordProcess(Request $request){
        // $email = $request->email;
        // $role = $request->role;
        // return view('auth.forgot-password-process', ['email' => $email, 'role' => $role]);
    }

    //mien
    public function home(){
        $page = 'Thông tin cá nhân';
        // get ma sinh vien and ma chuyen nganh
        $ma_sinh_vien = Auth::guard('student')->user()->ma_sinh_vien;

        $sinh_vien = SinhVien::select('sinh_viens.*', DB::raw('khoa_hocs.nam_bat_dau as nam_bat_dau'))
            ->join('khoa_hocs', 'sinh_viens.sv_khoa', '=', 'khoa_hocs.ma_khoa_hoc')
            ->where('sinh_viens.ma_sinh_vien', $ma_sinh_vien)
            ->first();
        $get_chuyen_nganh = ChuyenNganh::select('chuyen_nganhs.*', DB::raw('khoas.ten_khoa'))
            ->join('khoas', 'chuyen_nganhs.ma_khoa', '=', 'khoas.ma_khoa')
            ->where('chuyen_nganhs.ma_chuyen_nganh', $sinh_vien->ma_chuyen_nganh)
            ->first();
        // return view('student.information.index', ['page' => $page]);
        return view('student.information.index', ['page' => $page, 'sinh_vien' => $sinh_vien, 'get_chuyen_nganh' => $get_chuyen_nganh]);
    }

    public function edit(){
        $page = 'Sửa thông tin cá nhân';
        return view('student.information.edit', ['page' => $page]);
    }

    public function editProcess(editInfo $request){
        $ma_sinh_vien = Auth::guard('student')->user()->ma_sinh_vien;
        $sinh_vien = SinhVien::where('ma_sinh_vien', $ma_sinh_vien)->first();
        $sinh_vien->ho_ten = $request->ho_ten;
        $sinh_vien->gioi_tinh = $request->gioi_tinh;
        $sinh_vien->ngay_sinh = $request->ngay_sinh;
        $sinh_vien->dia_chi = $request->dia_chi;
        $sinh_vien->so_dien_thoai= $request->so_dien_thoai;

        // image upload
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
                return redirect()->back()->with('error', 'File ảnh không đúng định dạng');
            }
            $avatar = $ma_sinh_vien . "_code" . rand() . "." . $extension;

            $file->move("assets/img/profiles/AvatarSinhVien", $avatar);

            if ($sinh_vien->avatar != "avatar.jpg") {
                unlink("assets/img/profiles/AvatarSinhVien/" . $sinh_vien->avatar);
            }

            $sinh_vien->avatar = $avatar;
        }
        $sinh_vien->save();
        return redirect()->route('student.info.index')->with('message', 'Sửa thông tin thành công')->with('status', 'success');
    }

    public function changePassword(){
        $page = 'Đổi mật khẩu';
        return view('student.information.changePassword', ['page' => $page]);
    }

    public function changePasswordProcess(changePasswordRequest $request){
        $ma_sinh_vien = Auth::guard('student')->user()->ma_sinh_vien;
        $sinh_vien = SinhVien::where('ma_sinh_vien', $ma_sinh_vien)->first();
        // check old password
        if(password_verify($request->oldPassword, $sinh_vien->password)){
            // check new password and confirm password
            $sinh_vien->password = bcrypt($request->newPassword);
            $sinh_vien->save();
            return redirect()->route('student.info.index')->with('message', 'Đổi mật khẩu thành công')->with('status', 'success');
        }else{
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
        }
    }
}
