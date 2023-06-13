<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\slip_mg;
use Illuminate\Http\Request;

class BillController extends Controller
{
    function index(){
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('bill-register',compact('staffs'));
    }
    function register(Request $request){
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'staff_id' => 'required',
            'day' => 'required|date',
            'time'=>'required|time',
            'total'=>'required|numeric',
        ],[
            'customer_id.required'=>'スタッフを選択してください。',
            'staff_id.required'=>'担当スタッフをを選択してください。',
            'day.required'=>'日付を入力してください。',
            'day.date'=>'年-月-日の形を入力してください。',
            'time.required'=>'時間をを入力してください。',
            'time.time'=>'００：００の形を入力してください。',
            'total.required'=>'金額をを入力してください。',
            'total.numeric'=>'数字を入力してください。',
        ]);
        $customer = slip_mg::create([
            'customer_name' => $request->input('customer_name'),
            'company_name' => $request->input('company_name'),
            'birthday' => $request->input('birthday'),
            'staff_id' => $request->input('staff_id'),
            'remarks' => $request->input('remarks')
        ]);
        
        
        return;
    }
}
