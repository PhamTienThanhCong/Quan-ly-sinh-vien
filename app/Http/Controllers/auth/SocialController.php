<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SinhVien;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Socialite;
class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }  

    /**
     * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
     * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $email = $getInfo->email;

        // if session role = admin then check email in admins
        if(session('role') == 'admin'){
            $admin = Admin::where('email', $email)->first();
            if($admin){
                // save admin to auth session
                Auth::guard('admin')->login($admin);
                // remove session role
                session()->forget('role');
                return redirect()->route('admin.home');
            }else{
                // email wrong
                return redirect()->route('admin.login')->with('error', 'Email không tồn tại');
            }
        }else if(session('role') == 'student'){
            $student = SinhVien::where('email', $email)->first();
            if($student){
                // save student to auth session
                Auth::guard('student')->login($student);
                // remove session role
                session()->forget('role');
                return redirect()->route('student.home');
            }else{
                // email wrong
                return redirect()->route('admin.login')->with('error', 'Email không tồn tại');
            }
        }
        // 500 error
        return redirect()->route('admin.login')->with('error', 'Lỗi hệ thống');
        // return Redirect::to(Session::get('pre_url'));
    }

}
