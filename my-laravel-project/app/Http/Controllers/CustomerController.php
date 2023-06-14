<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\employee;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers=customer::select('customer_id','customer_name')->get();
        return view('list-customer',compact('customers'));
        // return view('test');
        
    }
    public function GetListCustomer(Request $request){
        if($request->ajax()){
            $id = $request->id;
            
            $customers = customer::leftJoin('employees','employees.staff_id','=','customers.staff_id')
                                    ->select('customers.customer_name','customers.birthday','customers.company_name','customers.staff_id','employees.staff_name')
                                    ->where('customer_id',$id)
                                    ->get();
            return response()->json($customers);
        }
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'customer_name' => 'required|string',
            'staff_id' => 'required',
            'birthday' => 'date',
        ],[
            'customer_name.required'=>'スタッフの名前を入力してください。',
            'birthday.date'=>'年-月-日の形を入力してください。',
            'staff_id.required'=>'担当スタッフをを入力してください。'
        ]);
        $customer = customer::create([
            'customer_name' => $request->input('customer_name'),
            'company_name' => $request->input('company_name'),
            'birthday' => $request->input('birthday'),
            'staff_id' => $request->input('staff_id'),
            'remarks' => $request->input('remarks')
        ]);
        // $customer = [    
        //     'customer_name' => $request->input('customer_name'),
        //     'company_name' => $request->input('company_name'),
        //     'birthday' => $request->input('birthday'),
        //     'staff_id' => $request->input('staff_id'),
        //     'remarks' => $request->input('remarks')
        // ];
        return redirect()->route('indexCusRegister')->with('message','登録完成しました。');
    } 
    //顧客登録表示
    public function indexRegister(){
        $customers=customer::select('customer_id','customer_name')->get();
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('customer-register',compact('customers','staffs'));
    }
}
