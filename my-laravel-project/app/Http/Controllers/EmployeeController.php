<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\attend_leave;
use App\Models\employee;
use App\Models\slip_mg;
use App\Models\salary;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(){
        if (!Auth::user()->isAdmin()) {
            return redirect('/news');
        }
        $staffs=employee::select('staff_id','staff_name')->get();
        return view('list-staff',compact('staffs'));        
    }
    public function IndexHistoryEditor(Request $request){
        $staff_id = $request->id;
        $work_date = $request->work_date;
        $staffAttend = attend_leave::where([
                            ['staff_id',$staff_id],
                            ['work_date',$work_date]
                        ])
                        ->first();
        return view('history_editor',compact('staffAttend'));     
    }
    public function graphHistory(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->Dataid;
            $data = attend_leave::
            select(DB::raw('DATE_FORMAT(work_date, "%m") AS FormatMonth'))
            ->selectRaw('SUM(TIMESTAMPDIFF(HOUR, attend_time, leaving_work)) AS totalHours')
            ->where('staff_id', $id)
            ->where('flag',0)
            ->whereYear('work_date', '=', DB::raw('YEAR(CURDATE())'))
            ->groupBy("FormatMonth")
            ->get();
            return response()->json($data);
        }
        return response();
    }
    public function HistoryEditor(Request $request){
        $existsattend = attend_leave::where([
                                    ['staff_id', $request->input('staff_id')],
                                    ['work_date', $request->input('work_date_old')]
                                ])
                                ->exists();
        if(!$existsattend){
            redirect()->route('list-staff');
        }
        $attendLeave= attend_leave::where([
                                ['staff_id','=', $request->input('staff_id')],
                                ['work_date','=', $request->input('work_date_old')]
                            ])
                            ->update([
                                'staff_id' => $request->input('staff_id'),
                                'work_date' => $request->input('work_date'),
                                'attend_time' => $request->input('attend_time'),
                                'leaving_work' => $request->input('leaving_work'),
                                'num_people' => $request->input('num_people'),
                            ]);
        if($attendLeave){
            return redirect()->route('history',['id'=>$request->input('staff_id')]); 
        }
        return redirect()->route('news');
    }
    public function indexstaffProfile(){
        $staff_id = Auth::user()->staff_id;
        $staff = employee::where("staff_id",$staff_id)->first();
        return view('staffprofile',compact('staff'));        
    }

    public function GetListStaff(Request $request){
        if($request->ajax()){
            $id = $request->id;
            $staffs = employee::select('staff_id','staff_name','tel','residence','birthday','remarks')
                                        ->where('staff_id',$id)
                                        ->get();
            return response()->json($staffs); 
        }
        return response();
    }
    public function GetListStaffs(Request $request){
        if($request->ajax()){
            $staffs = employee::select('staff_id','staff_name')
                                        ->get();
            return response()->json($staffs); 
        }
        return response();
    }
    //編集画面のindex
    public function indxEmpEditor(Request $request){
        if($request->id){
            $staff_id = $request->id;
            $nowStaffId = Auth::user()->staff_id;

            // if(!Auth::user()->isAdmin() || Auth::user()->staff_id != $staff_id){
                if(Auth::user()->isAdmin() || $staff_id == $nowStaffId){
                 
            $staff = employee::select('staff_id','staff_name','tel','residence','birthday','remarks','hourly_wage')
            ->where('staff_id',$staff_id)
            ->first();
return view("emp-editor",compact("staff"));
                }
                   
                return redirect()->route('staffProfile');
        }
        return redirect()->route('list-staff');
    }
    //編集処理
    public function editor(Request $request){
        $id = $request->staff_id;
        $hourlyWage = str_replace(',', '', $request->input('hourly_wage'));
        $request->merge(['hourly_wage' => $hourlyWage]);
        
        if(Auth::user()->isAdmin()){
            //adminの場合時給を編集あるため。
            $validatedData = $request->validate([
                'staff_name' => 'required|string',
                'tel' => 'required',
                'residence' => 'required|string',
                'birthday' => 'required|date',
                'hourly_wage' => 'required|numeric'
            ],[
                'staff_name.required'=>'スタッフの名前を入力してください。',
                'tel.required'=>'電話番号を入力してください。',
                'tel.numeric'=>'数字をを入力してください。',
                'residence.required'=>'住所を入力してください。',
                'birthday.required'=>'誕生日を入力してください。',
                'birthday.date'=>'年-月-日の形を入力してください。',
                'hourly_wage.required'=>'時給を入力してください。',
                'hourly_wage.numeric'=>'数字を入力してください。'
            ]);
        }
        if(!Auth::user()->isAdmin()){            
            $validatedData = $request->validate([
                'staff_name' => 'required|string',
                'tel' => 'required',
                'residence' => 'required|string',
                'birthday' => 'required|date'
            ],[
                'staff_name.required'=>'スタッフの名前を入力してください。',
                'tel.required'=>'電話番号を入力してください。',
                'tel.numeric'=>'数字をを入力してください。',
                'residence.required'=>'住所を入力してください。',
                'birthday.required'=>'誕生日を入力してください。',
                'birthday.date'=>'年-月-日の形を入力してください。'
            ]);
        }

        $test = employee::where('staff_id', $id)->update($validatedData);
        //アップデート成功のチェック
        if ($test > 0) {
            if(!Auth::user()->isAdmin()){
                return redirect()->route('staffProfile');
            }
            return redirect()->route('list-staff');

        } else {
            return back();
        }
    } 
    public function register(Request $request){
        if (!Auth::user()->isAdmin()) {
            return redirect('/news');
        }
        $hourly_wage = (float) str_replace(',', '', $request->input('hourly_wage'));
        $validatedData = $request->validate([
            'staff_name' => 'required|string',
            'tel' => 'required',
            'residence' => 'required|string',
            'birthday' => 'required|date',
        ],[
            'staff_name.required'=>'スタッフの名前を入力してください。',
            'tel.required'=>'電話番号を入力してください。',
            'tel.numeric'=>'数字をを入力してください。',
            'residence.required'=>'住所を入力してください。',
            'birthday.required'=>'誕生日を入力してください。',
            'birthday.date'=>'年-月-日の形を入力してください。',
        ]);
        $validator = Validator::make(['hourly_wage' => $hourly_wage], [
            'hourly_wage' => 'required|numeric',
        ],['hourly_wage.numeric'=>'数字をを入力してください。']);
        employee::create([
            'staff_name' => $request->input('staff_name'),
            'staff_pass'=> bcrypt('password'),
            'tel' => $request->input('tel'),
            'residence' => $request->input('residence'),
            'birthday' => $request->input('birthday'),
            'hourly_wage' => $request->input('hourly_wage'),
            'remarks' => $request->input('remarks')
        ]);
        return redirect()->route('list-staff')->with('message','登録完成しました。');
    }
    
    //出勤の履歴
    public function indexHistory(Request $request)
    {
        $currentYear = now()->format('Y');
        $currentMon = now()->format('m');
        $progressdate = now()->format('Y-m');
        if($request->has('id')){
            $id = $request->id;
        }else{
            $id = Auth::user()->staff_id;
        }
        $staff_name = employee::select('staff_name','staff_id')
                                    ->where('staff_id',$id )
                                    ->first();

        $staffs = attend_leave::select('work_date','attend_time','leaving_work')
                                ->where('staff_id',$id)
                                ->where('flag',0)
                                ->whereYear('work_date',$currentYear)
                                ->whereMonth('work_date',$currentMon)
                                ->orderBy('work_date','desc')
                                ->get();
        return view('history',compact('staffs','staff_name','progressdate'));
    }
    public function HistoryBack(Request $request){
        $date = $request->today;
        $progressdate =Carbon::parse($request->date)->subMonth()->format('Y-m');
        $currentMon =\Carbon\Carbon::createFromFormat('Y-m', $request->date)->subMonth();
        $currentYear = \Carbon\Carbon::createFromFormat('Y-m', $request->date)->subYear();
        if($request->has('id')){
            $id = $request->id;
        }else{
            $id = Auth::user()->staff_id;
        }
        $staff_name = employee::select('staff_name','staff_id')
                                    ->where('staff_id',$id )
                                    ->first();
        $staffs = attend_leave::select('work_date','attend_time','leaving_work')
                                ->where('staff_id',$id)
                                ->where('flag',0)
                                ->whereYear('work_date',$currentYear)
                                ->whereMonth('work_date',$currentMon)
                                ->orderBy('work_date','desc')
                                ->get();
        return view('history',compact('staffs','staff_name','progressdate'));
    }
    public function HistoryNEXT(Request $request){
        $date = $request->date;
        $progressdate =Carbon::parse($request->date)->addMonth()->format('Y-m');
        $currentMon =\Carbon\Carbon::createFromFormat('Y-m', $request->date)->addMonth();
        $currentYear = \Carbon\Carbon::createFromFormat('Y-m', $request->date)->addYear();
        if($request->has('id')){
            $id = $request->id;
        }else{
            $id = Auth::user()->staff_id;
        }
        $staff_name = employee::select('staff_name','staff_id')
                                    ->where('staff_id',$id )
                                    ->first();

        $staffs = attend_leave::select('work_date','attend_time','leaving_work')
                                ->where('staff_id',$id)
                                ->where('flag',0)
                                ->whereYear('work_date',$currentYear)
                                ->whereMonth('work_date',$currentMon)
                                ->orderBy('work_date','desc')
                                ->get();
        return view('history',compact('staffs','staff_name','progressdate'));
    }
    public function indexEditHistory(Request $request)
    {
        $currentYear = now()->format('Y');
        $currentMon = now()->format('m');
        if($request->has('id')){
            $id = $request->id;
        }else{
            $id = Auth::user()->staff_id;
        }
        $staff_name = employee::select('staff_name','staff_id')
                                    ->where('staff_id',$id )
                                    ->first();

        $staffs = attend_leave::select('work_date','attend_time','leaving_work')
                                ->where('staff_id',$id)
                                ->where('flag',1)
                                ->whereYear('work_date',$currentYear)
                                ->whereMonth('work_date',$currentMon)
                                ->get();
        return view('HistoryEditView',compact('staffs','staff_name'));
    }
    //出勤の履歴
    public function removeHistory(Request $request)
    {
        $staff_id = $request->staff_id;
        $time = $request->time;
        $deleted = attend_leave::where([
                                ['staff_id',"=",$staff_id],
                                ['work_date',"=",$time]]
                            )
                            ->update(['flag' => 1]);
        if($deleted){
            return response()->json(["message"=>"success"]);
        }else{
            
            return response()->json(["message"=>"fail"]);
        }

    }
    public function AdditionHistory(Request $request)
    {
        $staff_id = $request->staff_id;
        $time = $request->time;
        $deleted = attend_leave::where([
                            ['staff_id',"=",$staff_id],
                            ['work_date',"=",$time]]
                            )
                            ->update(['flag' => 0]);
        if($deleted){
            return response()->json(["message"=>"success"]);
        }else{
            
            return response()->json(["message"=>"fail"]);
        }

    }
    //給料計算
    public function indexPay(Request $request)
    {
        if(request()->has('date')){
            $currentDate = $request->date;
            $dateParts = explode('-', $currentDate);
            $currentYear = $dateParts[0]; // 年
            $currentMon = $dateParts[1]; // 月
        }else{
            $currentYear = now()->format('Y');
            $currentMon = now()->format('m');
        }
        $staffs = employee::leftJoin("salarys","salarys.staff_id","=","employees.staff_id")
                            ->select("employees.staff_id","employees.staff_name",
                                    DB::raw('COALESCE(salarys.total,0) as total'),)
                            ->whereMonth('salarys.salary_date', '=', $currentMon)
                            ->whereYear('salarys.salary_date', '=', $currentYear)
                            ->get();
                            // return view('test',compact('staffs'));    

        return view('pay-statement',compact('staffs'));    
    }
    function personPay(Request $request){
        $staff_id = $request->id;
        $currentDate = $request->currentDate;
        $dateParts = explode('-', $currentDate);
        $year = $dateParts[0]; // Năm
        $month = $dateParts[1]; // Tháng
        $results = DB::table('salarys')->select("*")
            ->join('employees', 'salarys.staff_id', '=', 'employees.staff_id')
            ->where('salarys.staff_id',$staff_id)
            ->whereMonth('salary_date', '=', $month)
            ->whereYear('salary_date', '=', $year)              
            ->get();
        if($results->isEmpty()){
            return response()->json(['message' => 'fail']);   
        }
        return response()->json($results);
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
        // 現在のパスワードをチェック
        if (!Hash::check($request->input('now_password'), $staff->password)) {
            return redirect()->back()->with('message', '現在のパスワードは間違ってます');
        }
        // 新しいパスワードをチェック
        if ($request->input('now_password') === $request->input('new_password')) {
            return redirect()->back()->with('message', '新パスワードは現在のパスワードと同じです');
        }
        // パスワードを変更
        $staff->password = Hash::make($request->input('new_password'));
        $staff->first_login = 0;
        $staff->save(); 
        return redirect()->back()->with('message','パスワードを変更しました');
    }
    function payStatementIndex(){
        $staffs = employee::select('staff_id','staff_name')
                ->get();
        return view('pay-statement',compact('staffs'));
    }
    function Calsalary(){
        $results = DB::table('employees as e')
        ->select(
            'e.staff_id',
            DB::raw('CASE  
                        WHEN COALESCE(d.total, 0) = 0 OR COALESCE(a.basic_salary, 0) = 0 
                        THEN 0
                        ELSE  (d.total - a.basic_salary)*0.1 + a.basic_salary + COALESCE(a.total_money_people, 0)
                    END AS total'),
            DB::raw('CASE  
                        WHEN COALESCE(d.total, 0) = 0 OR COALESCE(a.basic_salary, 0) = 0 
                        THEN 0
                        ELSE  ((d.total - a.basic_salary)*0.1 + a.basic_salary + COALESCE(a.total_money_people, 0))*0.1
                    END AS deduction'),
            DB::raw('CASE  
                        WHEN COALESCE(d.total, 0) = 0 OR COALESCE(a.basic_salary, 0) = 0 
                        THEN 0
                        ELSE  (d.total - a.basic_salary)*0.1 + a.basic_salary + COALESCE(a.total_money_people, 0)-((d.total - a.basic_salary)*0.1 + a.basic_salary + COALESCE(a.total_money_people, 0))*0.1
                    END AS total_branch'),
            DB::raw('COALESCE(a.total_time, 0) as total_time'),
            DB::raw('COALESCE(a.total_working_days, 0) as total_working_days'),
            DB::raw('COALESCE(a.total_money_people, 0) as total_money_people'),
            DB::raw('COALESCE(a.basic_salary, 0) as basic_salary')
        )
        ->leftJoin(DB::raw('(SELECT s.staff_id, SUM(b.total / a.cnt) as total
                            FROM slip_links s
                            JOIN (
                                SELECT slip_id, COUNT(staff_id) as cnt
                                FROM slip_links
                                GROUP BY slip_id
                            ) a ON a.slip_id = s.slip_id
                            JOIN slip_mgs b ON b.slip_id = s.slip_id
                            GROUP BY s.staff_id) as d'), 'd.staff_id', '=', 'e.staff_id')
        ->leftJoin(DB::raw('(SELECT 
                                    employees.staff_id,
                                    SUM(
                                        CASE 
                                            WHEN attend_leaves.attend_time <= attend_leaves.leaving_work 
                                                THEN FLOOR(TIMESTAMPDIFF(MINUTE, attend_leaves.attend_time, attend_leaves.leaving_work) / 30)
                                            ELSE FLOOR(
                                                        (TIMESTAMPDIFF(MINUTE, attend_leaves.attend_time, CAST("24:00:00" as time))
                                                        + TIMESTAMPDIFF(MINUTE, CAST("00:00:00" as time), attend_leaves.leaving_work)) / 30
                                                    )
                                        END
                                    ) AS total_time,
                                    SUM(
                                        CASE 
                                            WHEN attend_leaves.attend_time <= attend_leaves.leaving_work 
                                                THEN FLOOR(TIMESTAMPDIFF(MINUTE, attend_leaves.attend_time, attend_leaves.leaving_work) / 30)
                                            ELSE FLOOR(
                                                        (TIMESTAMPDIFF(MINUTE, attend_leaves.attend_time, CAST("24:00:00" as time))
                                                        + TIMESTAMPDIFF(MINUTE, CAST("00:00:00" as time), attend_leaves.leaving_work)) / 30
                                                    )
                                        END * employees.hourly_wage
                                    ) AS basic_salary,
                                    COUNT(attend_leaves.work_date) AS total_working_days,
                                    SUM(
                                        CASE
                                            WHEN attend_leaves.num_people > 0 THEN
                                                CASE
                                                    WHEN attend_leaves.attend_time < "20:10:00" THEN attend_leaves.num_people * 2000
                                                    WHEN attend_leaves.attend_time < "20:30:00" THEN attend_leaves.num_people * 1000
                                                    ELSE 0
                                                END
                                            ELSE 0
                                        END
                                    ) AS total_money_people
                                FROM employees
                                JOIN attend_leaves ON employees.staff_id = attend_leaves.staff_id
                                WHERE MONTH(attend_leaves.work_date) = MONTH(CURRENT_DATE())
                                    AND YEAR(attend_leaves.work_date) = YEAR(CURRENT_DATE())
                                GROUP BY employees.staff_id) as a'), 'a.staff_id', '=', 'e.staff_id')
        ->orderBy('e.staff_id')
        ->get();
        foreach ($results as $result) {
            DB::table('salarys')->insert([
                'staff_id' => $result->staff_id,
                'basic_salary' => $result->basic_salary,
                'total_working_days' => $result->total_working_days,
                'total_time' => $result->total_time,
                'total_money_people' => $result->total_money_people,
                'deduction' => $result->deduction,
                'total' => $result->total,
                'total_branch' => $result->total_branch,
        ]);
        }
        return view("test",compact('results'));
    }
    function salary(){
        
    }
}
