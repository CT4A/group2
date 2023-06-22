<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function index(){
        $notifications = notification::leftJoin('employees','employees.staff_id','=','notifications.staff_id')
                                    ->select('employees.staff_name','day','message')
                                    ->get();                      
        return view('news',compact("notifications"));
    }
    public function register(Request $request){
        
        notification::create([
            'staff_id' => $request->staff_id,
            'message' => $request->message,
        ]);
        return ;
    }
}
