<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlevelStudentPoints extends Model
{

    protected $guarded = [];

    public function school_subject(){
        return $this->belongsTo(school_subjects::class,'subject_id','id');
     }


    public function student(){
        return $this->belongsTo(students::class,'student_id','id');
    }
    
    public function student_subjects(){ 
    return $this->belongsTo(AssignStudentSubject::class, 'subject_id','id');
    }
    
    
   



}
