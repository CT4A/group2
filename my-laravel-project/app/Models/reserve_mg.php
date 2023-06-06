<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserve_mg extends Model
{
    use HasFactory;
    protected $fillable=['customer_name','reserve_date','reserve_time','reserve_people','table_num','staff_id','remarks','upper_limit'];
}
