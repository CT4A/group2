<?php

namespace App\Http\Controllers;
use App\Models\employee;

class BillController extends Controller
{
    function index(){
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('list-attend',compact('staffs','customers'));
    }
    
}
