<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\attend_leave;
use App\Models\employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        // $hourly_wage=$request->hourly_wage;
        // $hourly_wage = intval(str_replace(',','', $hourly_wage));//,消してintに変換

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
            'staff_pass'=> bcrypt('password'),
            'tel' => $request->input('tel'),
            'residence' => $request->input('residence'),
            'birthday' => $request->input('birthday'),
            'hourly_wage' => $request->input('hourly_wage'),
            'remarks' => $request->input('remarks')
        ]);
        return redirect()->route('indexEmpRegister')->with('message','登録完成しました。');
    } 
    //出勤の履歴
    public function indexHistory(Request $request)
    {
        // $id = $request->id;
        $id = 1;//
        $staff_name = employee::select('staff_name')
                                    ->where('staff_id',$id)
                                    ->first();
        $staffs = attend_leave::select('work_date','attend_time','leaving_work')
                                ->where('staff_id',$id)
                                ->get();
        return view('history',compact('staffs','staff_name'));
    }
    //給料計算
    public function indexPay(Request $request)
    {
        $staff_id = 1;        
        $staffs = DB::table('employees')
                    ->select('employees.staff_name', 'employees.staff_id',
                        DB::raw('"0" as total_salary'),
                        DB::raw('SUM(FLOOR(TIMESTAMPDIFF(MINUTE,attend_leaves.attend_time, attend_leaves.leaving_work)/30)) as total_time'),
                        DB::raw('SUM(FLOOR(TIMESTAMPDIFF(MINUTE,attend_leaves.attend_time, attend_leaves.leaving_work)/30)*employees.hourly_wage) as total_salary'),
                        DB::raw('COUNT(attend_leaves.work_date) AS total_working_days'),
                        DB::raw('SUM(IF(attend_leaves.num_people > 0,
                            IF(attend_leaves.attend_time < "20:10:00", attend_leaves.num_people * 2000,
                                IF(attend_leaves.attend_time < "20:30:00", attend_leaves.num_people * 1000, 0)), 0)) AS total_money_people')
                        )
                    ->join('attend_leaves', 'employees.staff_id', '=', 'attend_leaves.staff_id')
                    ->whereRaw('MONTH(attend_leaves.work_date) = MONTH(CURRENT_DATE())')
                    ->whereRaw('YEAR(attend_leaves.work_date) = YEAR(CURRENT_DATE())')
                    ->groupBy('employees.staff_id', 'employees.staff_name')
                    ->orderBy('employees.staff_id')
                    ->get();
                    
        return view('pay-statement',compact('staffs'));
    }
    //パスワード変更
    function changePass(Request $request){
        $validatedData = $request->validate([
            'now_password' => 'required',
            'new_password' => 'required',
            'new_passwordConf' => 'required',
        ],[
            'now_password.required'=>'現在のパスワードを入力してください。',
            'new_password.required'=>'新しいパスワードを入力してください。',
            'new_passwordConf.required'=>'新しいパスワードをもう一度入力してください。',
        ]);
        $user = Auth::user();
        $staff_id = $user->staff_id;
        $staff=employee::find($staff_id);
        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->input('now_password'), $staff->password)) {
            return redirect()->back()->with('message', '現在のパスワードは間違ってます');
        }
        // Kiểm tra mật khẩu mới
        if ($request->input('now_password') === $request->input('new_password')) {
            return redirect()->back()->with('message', '新パスワードは現在のパスワードと同じです');
        }
        // Cập nhật mật khẩu mới
        $staff->password = Hash::make($request->input('new_password'));
        $staff->fist_login = false;
        $staff->save();
        return redirect()->back()->with('message','パスワードを変更しました');
    }
    function payStatementIndex(){
        $staffs = employee::select('staff_id','staff_name')
                ->get();
        return view('pay-statement',compact('staffs'));
    }
}
