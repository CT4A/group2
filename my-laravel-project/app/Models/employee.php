<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'staff_id';
    public function customer()
    {
        return $this->hasMany(customer::class, 'staff_id');
    }
}
