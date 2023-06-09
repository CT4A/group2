<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\reserve_mg;
use Illuminate\Http\Request;

class resrveController extends Controller
{
    public function index()
    {
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('reserve-register',compact('staffs'));
    }

    public function reserveRegister(Request $request)
    {
        $validatedData = $request->validate([
            'reserve_people' => 'numeric',
            'customer_name' => 'required',
            'table_number'=>'numeric',
            'staff_id' => 'required',
            'reserve_date' => 'required|date',
            'reserve_time' => 'time',
            'upper_limit'=>'numeric',
        ],[
            'reserve_people.numeric'=>'数字を入力してください。',
            'customer_name.required'=>'顧客名を入力してください。',
            'staff_id.required'=>'担当者を選択してください。',
            'reserve_date.required'=>'予約日付を入力してください。',
            'reserve_date.date'=>'日付を入力してください。例：2023-06-24',
            'reserve_time.time'=>'時間を入力してください。例：23:00',
            'upper_limit.numeric'=>'数字を入力してください。',
        ]);
        reserve_mg::create([
            'customer_name' => $request->customer_name,
            'staff_id'=>$request->staff_id,
            'reserve_date' => $request->reserve_date,
            'reserve_time' => $request->reserve_time,
            'reserve_people'=>$request->reserve_people,
            'table_num' => $request->table_num,
            'remarks' => $request->remarks,
            'upper_limit'=>$request->upper_limit
        ]);
        return redirect()->route('reserveIndex')->with('message','予約しました。');
    }
}
  