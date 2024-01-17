<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Metadata\Uses;

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

            // ログイン成功
            $request->session()->regenerate();
            if(Auth::user()->role==="syukkin"){
                return redirect()->route('ListAttend');
            }
            
            if(auth()->user()->first_login){
                return redirect()->intended('/pass-change');
            }
            
            return redirect()->intended('/news');
        } else {
            // ログイン失敗
            return redirect()->back()->withErrors(['password' => '電話番号かパスワードか間違います。']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login'); //ログアウト時に転送。
    }
}
