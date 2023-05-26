<?php

namespace App\Http\Controllers;


use App\Models\customer;
use Illuminate\Http\Request;

class homeController extends Controller
{
    
    function index(){
        //今日の日付
        $today=now();
        $todayDay=$today->day;
        $todayMonth=$today->month;

        // あと2週間の日付
        $futureDate  = now()->addDays(14);
        $futureDay = $futureDate->day;
        $futureMonth = $futureDate->month;
        //今日から二週間には誕生日がある顧客を探す。
        $customerData = Customer::whereRaw("(MONTH(birthday) = ? AND DAY(birthday) >= ?) OR (MONTH(birthday) = ? AND DAY(birthday) <= ?)", [$todayMonth, $todayDay, $futureMonth, $futureDay])
        ->get();
        return view('home',['customerDatas'=>$customerData]);
    }
}
