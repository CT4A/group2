<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\attend_leave;
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
    public function register(Request $request){
        $validatedData = $request->validate([
            'staff_name' => 'required|email',
            'tel' => 'required|email',
            'residence' => 'required|email',
            'birthday' => 'required|email',
            'hourly_wage' => 'required|email',
            'remarks' => 'required|email',
        ]);
        $employee = employee::create([
            'staff_name' => $request->input('staff_name'),
            'tel' => $request->input('tel'),
            'residence' => $request->input('residence'),
            'birthday' => $request->input('birthday'),
            'hourly_wage' => $request->input('hourly_wage'),
            'remarks' => $request->input('remarks')
        ]);
        // return redirecr();
    } 

    public function history(Request $request)
    {
        $id = $request->id;
        $datas = attend_leave::select('work_date','attend_time','leaving_work')
                    ->where('staff_id',$id)
                    ->get();
        return view('history',compact('datas'));
    }
}
