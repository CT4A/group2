<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slip_mg extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','staff_id','ap_day','total'];
}
