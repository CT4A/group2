<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'staff_id';
    protected $fillable=['staff_pass','staff_name','tel','residence','birthday','hourly_wage','remarks'];
    public function customer()
    {
        return $this->hasMany(customer::class, 'staff_id');
    }
}
