<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\attend_leave;
use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('list-staff',compact('staffs'));        
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
            'staff_name' => 'required|string',
            'tel' => 'required|numeric',
            'residence' => 'required|string',
            'birthday' => 'required|date',
            'hourly_wage' => 'numeric'
        ],[
            'staff_name.required'=>'スタッフの名前を入力してください。',
            'tel.required'=>'電話番号を入力してください。',
            'tel.numeric'=>'数字をを入力してください。',
            'residence.required'=>'住所を入力してください。',
            'birthday.required'=>'誕生日を入力してください。',
            'birthday.date'=>'年-月-日の形を入力してください。',
            'hourly_wage.numeric'=>'数字をを入力してください。'
        ]);
        $employee = employee::create([
            'staff_name' => $request->input('staff_name'),
            'staff_password'=> bcrypt('password'),
            'tel' => $request->input('tel'),
            'residence' => $request->input('residence'),
            'birthday' => $request->input('birthday'),
            'hourly_wage' => $request->input('hourly_wage'),
            'remarks' => $request->input('remarks')
        ]);
        return view('test',['message'<='success']);
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
