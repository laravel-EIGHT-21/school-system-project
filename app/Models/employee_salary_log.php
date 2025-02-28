<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee_salary_log extends Model
{
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
        }




        
    public function salary(){
    	return $this->belongsTo(employee_salary::class,'salary_id','id');
    }



}
