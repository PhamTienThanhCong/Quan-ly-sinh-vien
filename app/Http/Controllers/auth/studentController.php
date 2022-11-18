<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $email = $request->email;
        $password = $request->password;

        $admin = SinhVien::where('email', $email)->first();

        if($admin){
            // check password
            if(password_verify($password, $admin->password)){
                // save admin to auth session
                Auth::guard('student')->login($admin);
                // return redirect()->route('student.home');
                return Auth::guard('student')->user();
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
}
