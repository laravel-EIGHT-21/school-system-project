<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class, 'employee_id','id');
        }

        public function purpose(){
            return $this->belongsTo(LeavePurpose::class,'leave_purpose_id','id');
        }


}
