<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class testController extends Controller
{
    function index(){
        $today=now();
        $todayDay=$today->day;
        $todayMonth=$today->month;

        $futureDate  = now()->addDays(14);
        $futureDay = $futureDate->day;
        $futureMonth = $futureDate->month;

        $customerData = Customer::whereRaw("(MONTH(birthday) = ? AND DAY(birthday) >= ?) OR (MONTH(birthday) = ? AND DAY(birthday) <= ?)", [$todayMonth, $todayDay, $futureMonth, $futureDay])
        ->get();
        return view('test',['customerDatas'=>$customerData]);
    }
    //
}
