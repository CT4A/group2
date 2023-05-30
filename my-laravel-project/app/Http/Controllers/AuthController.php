<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $validatedData = $request->validate([
            'account' => 'required|max:255|unique:users',
            // 'password' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);
    }
}
