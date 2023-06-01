<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class GetListCustomerController extends Controller
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
            'customer_name' => 'required|email',
            'company_name' => 'email',
            'birthday' => 'required|email',
            'staff_id' => 'required|email',
            'remarks' => 'email'
        ]);
        $customer = customer::create([
            'customer_name' => $request->input('customer_name'),
            'company_name' => $request->input('company_name'),
            'birthday' => $request->input('birthday'),
            'staff_id' => $request->input('staff_id'),
            'remarks' => $request->input('remarks')
        ]);
        // return redirecr();
    } 
}
