<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class assign_olevel_student extends Model
{
        
    protected $guarded = [];



    
    public function student(){
        return $this->belongsTo(students::class,'student_id','id');
    }
    
     
    
    public function student_class(){
        return $this->belongsTo(classes::class,'class_id','id');
    }
    
    
    public function student_year(){
        return $this->belongsTo(year::class,'year_id','id');
    }
    
    
    
    
    public function attendance(){
        return $this->belongsTo(student_attendance::class,'id','assign_student_id');
    }
    
    
    



}
