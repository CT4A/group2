<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function register(Request $request){
        if (!Auth::user()->isAdmin()) {
            return redirect('/news');
        }
        $data=["start_time"=>$request->start_time,
                "end_time"=>$request->end_time, 
                "reserve_people"=>$request->reserve_people,       
        ];
        $data=json_encode($data);
            
        // return response()->$data;
        return view('test',compact('data'));
    }
}
