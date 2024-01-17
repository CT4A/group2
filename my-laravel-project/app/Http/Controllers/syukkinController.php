<?php

namespace App\Http\Controllers;

use App\Models\attend_leave;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class syukkinController extends Controller
{
    function index(){
        if(!Auth::user()->isSyukkin()){
            return redirect()->route('/news');
        }
        $today = Carbon::now()->format('Y/m/d');

$syukkins = DB::table(DB::raw("(SELECT staff_name, attend_time AS time, '出勤' AS type
                            FROM attend_leaves
                            LEFT JOIN employees ON employees.staff_id = attend_leaves.staff_id
                            WHERE work_date = '$today' AND attend_time is not null
                            UNION ALL
                            SELECT staff_name, leaving_work AS time, '退勤' AS type
                            FROM attend_leaves
                            LEFT JOIN employees ON employees.staff_id = attend_leaves.staff_id
                            WHERE work_date = '$today' AND leaving_work is not null
                            ) AS t"))
    ->orderBy('t.time')
    ->select('t.staff_name', 't.time', 't.type')
    ->get();
        return view('syukkin',compact('syukkins'));
    }

    function attend(Request $request){
        if(!Auth::user()->isSyukkin()){
            return redirect()->route('/news');
        }
        $existsattend = attend_leave::where([
                                ['staff_id', $request->input('staff_id')],
                                ['work_date', $request->input('work_date')]
                            ])
                            ->exists();
        if($existsattend){
            return response()->json(['error' => true]);
        }
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
        if(!Auth::user()->isSyukkin()){
            return redirect()->route('/news');
        }
        $existsattend = attend_leave::where([
            ['staff_id', $request->input('staff_id')],
            ['work_date', $request->input('work_date')]
        ])
        ->exists();
        $existsLeave = attend_leave::where([
            ['staff_id', $request->input('staff_id')],
            ['work_date', $request->input('work_date')],
            ['leaving_work', null]
        ])
        ->exists();
        if(!$existsattend){
            return response()->json(['error' => true,'message' => '今日はまだ出勤しましせんでした。']);
        }
        if(!$existsLeave){
            return response()->json(['error' => true,'message' => '今日は退勤しました。']);
        }
        $attendLeave = attend_leave::where('staff_id','=',$request->input('staff_id'))
                                    ->where('work_date','=',$request->input('work_date'))
                                    ->update(['leaving_work' => $request->input('leaving_work')]);
        $data=['message'=> 'success'];
        return response()->json($data);
        }
}
