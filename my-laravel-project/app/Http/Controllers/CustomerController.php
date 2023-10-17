<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\employee;
use App\Models\liquor_mg;
use App\Models\slip_mg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    public function index(){
        $customers=customer::select('customer_id','customer_name')->get();
        return view('list-customer',compact('customers'));
        // return view('test');
        
    }
    //編集表示
    public function indexCusEditor(Request $request){
        //顧客を選択したかどうか（urlを直接に入力する）
        if($request->has('id')){
            $id=$request->id;
            $existsCustomer = DB::table('customers')->where('customer_id', $id)->exists();
            //urlから受けたのIDは存在のチェック（urlに直接入力する防止）
            if ($existsCustomer) {
                $customer = Customer::where('customer_id', $id)
                                ->select('customers.staff_id','customers.customer_id', 'customers.customer_name', 'customers.company_name', 'customers.birthday', 'customers.staff_id', 'customers.remarks', 'employees.staff_name')
                                ->join('employees', 'customers.staff_id', '=', 'employees.staff_id')
                                ->first();
            $staffs=employee::select('staff_id','staff_name')->get();  
            return view('customer-editor',compact('staffs','customer'));
            } else {
                //存在してない場合顧客リストページに転送します。
                return redirect()->route('list-customer');
            }            
        }else{
            return back();
        }
    }
    // 編集処理
    public function editor(Request $request){
        
        $validatedData = $request->validate([
            'customer_id'=>'required|exists:customers,customer_id',
            'customer_name' => 'required|string',
            'staff_id' => 'required',
            'birthday' => 'date',
        ],[
            'customer_name.required'=>'スタッフの名前を入力してください。',
            'birthday.date'=>'年-月-日の形を入力してください。',
            'staff_id.required'=>'担当スタッフをを入力してください。'
        ]);
        $customer_id = $request->customer_id;
        $test = customer::where('customer_id', $customer_id)->update($validatedData);
        //アップデート成功のチェック
        if ($test > 0) {
            return redirect()->route('list-customer')->with('message','登録完成しました。');
        } else {
            return back();
        }
    } 
    public function GetListCustomer(Request $request){
        if($request->ajax()){
            $id = $request->id;
            
            $customerInfo = customer::leftJoin('employees','employees.staff_id','=','customers.staff_id')
                                    ->select('customers.customer_id','customers.customer_name','customers.birthday','customers.company_name','customers.staff_id','employees.staff_name')
                                    ->where('customer_id',$id)
                                    ->get();

            $slipMgsTotal = slip_mg::select(
                DB::raw('COALESCE(SUM(CASE WHEN MONTH(ap_day) = MONTH(CURRENT_DATE()) AND YEAR(ap_day) = YEAR(CURRENT_DATE()) THEN total ELSE 0 END), 0) AS total_this_month'),
                DB::raw('COALESCE(SUM(CASE WHEN MONTH(ap_day) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(ap_day) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH) THEN total ELSE 0 END), 0) AS total_last_month')
            )
            ->where('customer_id', $id)
            ->groupBy('customer_id')
            ->get();
            $data = [
                'customerInfo' => $customerInfo,
                'slipMgsTotal' => $slipMgsTotal,
            ];
            return response()->json($data);
        }
    }
    //顧客新規登録
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

        return redirect()->route('indexCusRegister')->with('message','登録完成しました。');
    } 
    //顧客登録表示
    public function indexRegister(){
        $customers=customer::select('customer_id','customer_name')->get();
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('customer-register',compact('customers','staffs'));
    }
}
