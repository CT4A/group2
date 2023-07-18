<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'customer_id';
    protected $fillable =['customer_name','company_name','customer_type','birthday','staff_id','remarks']; 

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'staff_id');
    }
}
