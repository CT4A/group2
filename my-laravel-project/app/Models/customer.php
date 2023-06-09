<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'customer_id';
    protected $fillable =['customer_name','company_name','customer_type','birthday','staff_id','remarks']; 

    public function employee()
    {
        return $this->belongsTo(employee::class, 'staff_id');
    }
}
