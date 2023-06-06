<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attend_leave extends Model
{
    use HasFactory;
    protected $fillable=['staff_id','work_date','attend_time','leaving_work','num_people'];
}
