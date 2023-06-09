<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class liquor_link extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','liquor_id','liquor_number','liquor_day','remarks'];
}
