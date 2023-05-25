<?php

namespace App\Http\Controllers;
use App\Models\employee;
use Illuminate\Http\Request;

class GetListStaffController extends Controller
{
    public function index(){
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('itiran',compact('staffs'));
        // return view('test');
        
    }
    public function GetListStaff(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $staffs = employee::select('staff_id','staff_name','tel','residence','birthday','remarks')
                                        ->where('staff_id',$id)
                                        ->get();
            return response()->json($staffs);
        }
        
    }
}
