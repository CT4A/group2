<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    function index(){
        return view('login');
    }
    
    function login(Request $request){
        $keys=[
            'tel'=>$request->tel,
            'password'=>$request->password,
        ];
        if (Auth::attempt($keys)) {
            // Đăng nhập thành công
            $request->session()->regenerate();
            return redirect()->intended('/test')->with(['message'=>'login success']);
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->withErrors(['tel' => '電話番号かパスワードか間違います。']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Điều hướng về trang chủ hoặc trang nào bạn mong muốn sau khi đăng xuất
    }
}
