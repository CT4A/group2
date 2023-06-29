<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class newsController extends Controller
{
    public function index(){
        //get data from notifications
        $notifications = notification::leftJoin('employees','employees.staff_id','=','notifications.staff_id')
                                    ->select('employees.staff_name','day','message')
                                    ->get();     
        //get customer of birthday
        $today=now();
        $todayDay=$today->day;
        $todayMonth=$today->month;
        // あと2週間の日付
        $futureDate  = now()->addDays(14);
        $futureDay = $futureDate->day;
        $futureMonth = $futureDate->month;
        //今日から二週間には誕生日がある顧客を探す。
        $customerDatas = Customer::whereRaw("(MONTH(birthday) = ? AND DAY(birthday) >= ?)
                                            OR (MONTH(birthday) = ? AND DAY(birthday) <= ?)",
                                            [$todayMonth, $todayDay, $futureMonth, $futureDay])
                                    ->get();
        return view('news',compact("notifications","customerDatas"));
    }
    public function register(Request $request){
        $staff_id = Auth::user()->staff_id;
        $today = Carbon::now()->format('Y-m-d');
        notification::create([
            'staff_id' => $staff_id,
            'message' => $request->remarks,
            'day' =>$today,
        ]);
        return ;
    }
}
