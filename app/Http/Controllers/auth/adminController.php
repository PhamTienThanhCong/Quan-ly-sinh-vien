<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function home()
    {
        return Auth::guard('admin')->user();
    }

    public function login(){
        // save role to session
        session(['role' => 'admin']);
        return view('auth.login', ['role' => 'admin']);
    }
    public function loginProcess(Request $request){
        // remove role from session
        $request->session()->forget('role');
        $email = $request->email;
        $password = $request->password;

        $admin = Admin::where('email', $email)->first();
        if($admin){
            // check password
            if(password_verify($password, $admin->password)){
                // save admin to auth session
                Auth::guard('admin')->login($admin);
                return redirect()->route('admin.home');
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
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function forgotPassword(){
        return view('auth.forgot-password', ['role' => 'admin']);

    }
    public function forgotPasswordProcess(Request $request){
        // $email = $request->email;
        // $role = $request->role;
        // return view('auth.forgot-password-process', ['email' => $email, 'role' => $role]);
    }
    
    public function myAccount(){
        return view('admin.home', ['page' => 'Thông tin cá nhân']);
    }

}
