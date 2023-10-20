<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
            $request->session()->regenerate();
            $user = Auth::user();
            return redirect()->intended('/test')->with(['message'=>'login success','user'=>$user]);
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->withErrors(['tel' => '電話番号かパスワードか間違います。']);
        }
    }
}
