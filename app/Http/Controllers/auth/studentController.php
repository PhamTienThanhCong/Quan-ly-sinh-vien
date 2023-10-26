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
    a