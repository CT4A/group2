<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Models\salary;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        //月末に給料を計算する
        $schedule->call(function(){
            $staffs = DB::table('employees')
            ->join('attend_leaves', 'employees.staff_id', '=', 'attend_leaves.staff_id')
            ->select(
                'employees.staff_id',
                'employees.staff_name',
                DB::raw('SUM(FLOOR(TIMESTAMPDIFF(MINUTE, attend_leaves.attend_time, attend_leaves.leaving_work)/30)) as total_time'),
                DB::raw('SUM(FLOOR(TIMESTAMPDIFF(MINUTE, attend_leaves.attend_time, attend_leaves.leaving_work)/30) * (employees.hourly_wage/2)) as hours_salary'),
                DB::raw('COUNT(attend_leaves.work_date) AS total_working_days'),
                DB::raw('SUM(IF(attend_leaves.num_people > 0, 
                                IF(attend_leaves.attend_time < "20:10:00", 
                                    attend_leaves.num_people * 2000, 
                                    IF(attend_leaves.attend_time < "20:30:00", 
                                        attend_leaves.num_people * 1000,
                                         0)), 
                                    0)) AS total_money_people')
            )
            ->whereMonth('attend_leaves.work_date', '=', date('m'))
            ->whereYear('attend_leaves.work_date', '=', date('Y'))
            ->groupBy('employees.staff_id', 'employees.staff_name')
            ->orderBy('employees.staff_id')
            ->get();

            $slips = DB::table('slip_links')
            ->selectRaw('SUM(total) as earings, slip_links.staff_id')
            ->join('slip_mgs', 'slip_links.slip_id', '=', 'slip_mgs.slip_id')
            ->join(DB::raw('(SELECT slip_links.slip_id, COUNT(slip_links.staff_id) as cnt
                        FROM slip_links
                        JOIN slip_mgs ON slip_links.slip_id = slip_mgs.slip_id
                        WHERE MONTH(slip_mgs.ap_day) = MONTH(CURRENT_DATE())
                            AND YEAR(slip_mgs.ap_day) = YEAR(CURRENT_DATE())
                        GROUP BY slip_links.slip_id) slip'), 'slip.slip_id', '=', 'slip_mgs.slip_id')
            ->groupBy('slip_links.staff_id')
            ->get();

            $results = $staffs->map(function ($item) use ($slips) {
                //ele of staffs
                $hours_salary = $item->hours_salary;
                $total_money_people = $item->total_money_people;
                //基本給
                $basic_salary = $hours_salary+$total_money_people;

                $staffId = $item->staff_id;
                $matchingSlip = $slips->firstWhere('staff_id', $staffId);
                $item->basic_salary=$basic_salary;//基本給追加
                if($matchingSlip){
                    $earings = $matchingSlip->earings;//売上
                    $total = $basic_salary + ($earings - $basic_salary)*0.1;//総合金額（まだ引かれない）
                    $deduction = $total*0.1;//控除
                    $item->total=$total;
                    $item->deduction=$deduction;

                }else{
                    $earings = 0;
                    $total = $basic_salary;
                    $deduction = $total*0.1;
                    $item->total=$total;
                    $item->deduction=$deduction;
                }

                return $item;
            });

            DB::transaction(function () use ($results) {
                $results->each(function ($item) {
                    $model = new salary($item);
                    $model->save();
                }); 
            });
        })->lastDayOfMonth('00:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
