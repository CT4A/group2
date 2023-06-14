<?php

namespace App\Http\Controllers;

use App\Models\attend_leave;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class syukkinController extends Controller
{
    function index(){
        $syukkins = DB::table(function ($subquery) {
            $today = Carbon::now()->format('Y/m/d');
            $subquery->select('staff_name', 'attend_time as time', DB::raw("'出勤' as type",))
                ->from('attend_leaves')
                ->leftJoin('employees','employees.staff_id','=','attend_leaves.staff_id')
                ->where('work_date',$today);

            $subquery->unionAll(function ($unionQuery) {
                $today = Carbon::now()->format('Y/m/d');
                $unionQuery->select('staff_name', 'leaving_work as time', DB::raw("'退勤' as type"))
                    ->from('attend_leaves')
                    ->leftJoin('employees','employees.staff_id','=','attend_leaves.staff_id')
                    ->where('work_date',$today);
            });
        }, 't')
            ->orderBy('t.time')
            ->select('t.staff_name', 't.time', 't.type')
            ->get();
        

        return view('syukkin',compact('syukkins'));
    }

    function attend(Request $request){

    }
    
    function leave(Request $request){

    }
}
