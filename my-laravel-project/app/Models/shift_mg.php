<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shift_mg extends Model
{
    use HasFactory;
    protected $fillable=['staff_id','request_date','start_time','end_time'];
}
