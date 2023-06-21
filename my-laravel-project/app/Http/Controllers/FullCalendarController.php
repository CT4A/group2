<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shift_mg;
use Illuminate\Support\Facades\DB;

class FullCalendarController extends Controller
{
    public function index(Request $request)
    {
    	return view('work-calendar');
    }
    public function getEvents(Request $request)
    {
			$shift_mgs = shift_mg::leftJoin('employees','employees.staff_id','=','shift_mgs.staff_id')
									->select('staff_name AS title',
											DB::raw("CONCAT(request_date, ' ', start_time) AS start"),
											DB::raw("CONCAT(request_date, ' ', end_time) AS end"))
									->get();
            return response()->json($shift_mgs);
	}
}
