<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\employee;
use App\Models\slip_mg;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BillController extends Controller
{
    function index(){
        $staffs=employee::select('staff_id','staff_name')->get();
        $customers=customer::select('customer_id','customer_name')->get();
        return view('bill-register',compact('staffs','customers'));
    }
    //伝票一覧
    function indexList(){
        $slips=slip_mg::leftJoin('customers','slip_mgs.customer_id','=','customers.customer_id')
                        ->leftJoin('employees','slip_mgs.responsibility','=','employees.staff_id')
                        ->select('employees.staff_name','slip_mgs.ap_day','slip_mgs.total','customers.customer_name')
                        ->orderBy('slip_mgs.ap_day','desc')
                        ->get();
        
        return view('list-bill',compact('slips'));
    }
    //伝票登録
    function register(Request $request){
        $validatedData = $request->validate([
            'customer_id' => 'required|numeric',
            'staff_id' => 'required|numeric',
            'day' => 'required|date',
            'time'=>'required|custom_time',
            
            'total'=>'required|numeric',
        ],[
            'customer_id.required'=>'顧客を選択してください。',
            'staff_id.required'=>'担当スタッフをを選択してください。',
            'day.required'=>'日付を入力してください。',
            'day.date'=>'年-月-日の形を入力してください。',
            
            'time.required'=>'時間をを入力してください。',
            'time.time'=>'００：００の形を入力してください。',
            'total.required'=>'金額をを入力してください。',
            'total.numeric'=>'数字を入力してください。',
        ]);
        $ap_day = $request->input('day') . " " . $request->input('time');
        $customer = slip_mg::create([
            'customer_id' => $request->input('customer_id'),
            'responsibility' => $request->input('staff_id'),
            'slip_id' => $request->input('slip_id'),
            'ap_day' => $request->input('day'),
            'total' => $request->input('total')
        ]);
        
        return  redirect()->route('list-bill');
    }
}
