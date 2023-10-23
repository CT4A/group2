<?php

namespace App\Http\Controllers;
use App\Models\employee;
use Illuminate\Support\Facades\Auth;

class ListAttendController extends Controller
{
    function index(){
        if(Auth::user()->isSyukkin() || Auth::user()->isAdmin()){   
            $staffs=employee::select('staff_id','staff_name')->get();
            return view('list-attend',compact('staffs'));
        }
        return redirect()->route('news');
    }
    
}
