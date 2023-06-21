<?php

namespace App\Models;
use Illuminate\Contracts\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class employee extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'staff_id';
    protected $fillable=['staff_pass','staff_name','role','tel','residence','birthday','hourly_wage','remarks'];
    public function customer()
    {
        return $this->hasMany(customer::class, 'staff_id');
    }
    
    //オーナかどうか確認する
    function isAdmin(){
        return $this->role ==='admin';
    }
    
    //スタッフかどうか確認する
    function isStaff(){
        return $this->role ==='user';
    }
    
    public function getAuthIdentifierName(){
        return $this->tel;
    }
    public function getAuthPassword(){
        return $this->staff_pass;
    }
    public function getAuthIdentifier(){
        return $this->staff_id;
    }
}
