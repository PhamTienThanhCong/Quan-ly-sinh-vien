<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function login(){
        return view('auth.login', ['role' => 'student']);
    }
    public function loginProcess(Request $request){
        
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
