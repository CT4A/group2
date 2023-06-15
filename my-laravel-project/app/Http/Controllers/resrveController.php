<?php

namespace App\Http\Controllers;
use App\Models\employee;
use App\Models\reserve_mg;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\DateFormat;


class resrveController extends Controller
{
    public function index()
    {
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('reserve-register',compact('staffs'));
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'reserve_people' => 'nullable|numeric',
            'customer_name' => 'required',
            'staff_id' => 'required',
            'reserve_date' => 'required|date',
            // 'reserve_time' => 'nullable|date_format:H:i',
            'table_number'=>'nullable|numeric',
            'upper_limit'=>'nullable|numeric',
        ],[
            'reserve_people.numeric'=>'数字を入力してください。',
            'customer_name.required'=>'顧客名を入力してください。',
            'staff_id.required'=>'担当者を選択してください。',
            'reserve_date.required'=>'予約日付を入力してください。',
            'reserve_date.date'=>'日付を入力してください。例：2023-06-24',
            // 'reserve_time.time'=>'時間を入力してください。例：23:00',
            'upper_limit.numeric'=>'数字を入力してください。',
        ]);
        reserve_mg::create([
            'customer_name' => $request->input('customer_name'),
            'staff_id'=>$request->input('staff_id'),
            'reserve_date' => $request->input('reserve_date'),
            'reserve_time' => $request->input('reserve_time'),
            'reserve_people'=>$request->input('reserve_people'),
            'table_num' =>$request->input('table_num'),
            'remarks' => $request->input('remarks'),
            'upper_limit'=>$request->input('upper_limit'),
        ]);
        return redirect()->route('indexResRegister')->with('message','予約しました。');
    }
}
  