<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salary extends Model
{
    use HasFactory;
    protected $fillable=["staff_id",'basic_salary',
    'total_working_days','total_time','total_money_people',
    'deduction','total','total_branch'];
}
