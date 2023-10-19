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
        
        $existsattend = DB::table('customers')->where('customer_id', $id)->exists();
        $attendLeave= attend_leave::create([
            'staff_id' => $request->input('staff_id'),
            'work_date' => $request->input('work_date'),
            'attend_time' => $request->input('attend_time'),
            'num_people' => $request->input('num_people'),
        ]);
        $data=['message'=> 'success'];
        return response()->json($data);
    }
    function leave(Request $request){

        $attendLeave = attend_leave::where('staff_id','=',$request->input('staff_id'))
                                    ->where('work_date','=',$request->input('work_date'))
                                    ->update(['leaving_work' => $request->input('leaving_work')]);
        $data=['message'=> 'success'];
        return response()->json($data);
        }
}
