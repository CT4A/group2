<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\shift_mg;
use App\Models\slip_mg;
use Illuminate\Http\Request;

class shiftController extends Controller
{
    public function index(){
        $staffs = employee::select('staff_id','staff_name')->get(); 
        return view('shift-register',compact('staffs'));
    }
    public function register(Request $request){
        // $validatedData = $request->validate([
        //     'request_date' => 'required|date',
        //     'start_time' => 'required',
        //     'end_time' => 'required',
        // ],[
        //     'request_date.required'=>'出勤日付を入力してください。',
        //     'request_date.date'=>'例：2023ー05ー29を入力してください。',
        //     'start_time.required'=>'出勤時間を入力してください。',
        //     'end_time.required'=>'退勤時間を入力してください。',            
        // ]);

        // $staff_id=2;
        // $slip_mgs = shift_mg::create([
        //     'staff_id' => 2,
        //     'request_date'=>$request->input('request_date'),
        //     'start_time' => $request->input('start_time'),
        //     'end_time' => $request->input('end_time'),
        //     'num_people' => $request->input('num_people')
        // ]);
        $slip_mgs = shift_mg::create([
            'staff_id' => 2,
            'request_date'=>'2023-06-14',
            'start_time' => '17:00',
            'end_time' => '20:00',
            'num_people' => 3
        ]);

        return redirect()->route('indexShiftRegister')->with('message','登録完成しました。');


    }
}
