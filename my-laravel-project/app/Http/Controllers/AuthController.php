<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function login(Request $request){
    //     $validatedData = $request->validate([
    //         'account' => 'required',
    //         // 'password' => 'required|email|unique:users',
    //         'password' => 'required'
    //     ]);

    // }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'tel' => 'required',
            'password' => 'required'
        ],
        [   
            'tel.required'=>'電話番号を入力してください。',
            'password.required'=>'パスワードを入力してください。'
         ]);
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            return redirect()->intended('/test');
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->withErrors(['email' => 'Đăng nhập không thành công']);
        }
    }
}
