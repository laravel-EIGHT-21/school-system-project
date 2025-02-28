<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student_attendance extends Model
{
    protected $guarded = [];



public function student(){
return $this->belongsTo(students::class,'student_id','id');
}




public function teacher(){
    return $this->belongsTo(User::class,'teacher_id','id');
    }
    



public function session(){
return $this->belongsTo(class_sessions::class,'session_id','id');
}


public function school_subject(){
return $this->belongsTo(school_subjects::class,'subject_id','id');
}
    
   



}
