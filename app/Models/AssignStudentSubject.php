<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignStudentSubject extends Model
{
    
    protected $guarded = [];



public function student(){
return $this->belongsTo(students::class,'student_id','id');
}



public function school_subject(){
return $this->belongsTo(school_subjects::class,'subject_id','id');
}



}
