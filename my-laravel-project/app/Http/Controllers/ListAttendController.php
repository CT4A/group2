<?php

namespace App\Http\Controllers;
use App\Models\employee;

class ListAttendController extends Controller
{
    function index(){
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('list-attend',compact('staffs'));
    }
    
}
