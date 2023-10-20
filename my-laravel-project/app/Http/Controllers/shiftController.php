<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\shift_mg;
use App\Models\slip_mg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class shiftController extends Controller
{
    public function index(){
        $staffs = employee::select('staff_id','staff_name')->get(); 
        return view('shift-register',compact('staffs'));
    }
    public function register(Request $request){
        $staff_id = Auth::user()->staff_id;
        $validatedData = $request->validate([
            'request_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ],[
            'request_date.required'=>'出勤日付を入力してください。',
            'request_date.date'=>'例：2023ー05ー29を入力してください。',
            'start_time.required'=>'出勤時間を入力してください。',
            'end_time.required'=>'退勤時間を入力してください。',            
        ]);

        $slip_mgs = shift_mg::create([
            'staff_id' => $staff_id,
            'request_date'=>$request->input('request_date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'num_people' => $request->input('num_people')
        ]);

        return redirect()->route('indexShiftRegister')->with('message','登録完成しました。');


    }
}
