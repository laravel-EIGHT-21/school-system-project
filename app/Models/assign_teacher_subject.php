<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class assign_teacher_subject extends Model
{
    protected $guarded = [];



    public function subject(){
        return $this->belongsTo(school_subjects::class,'subject_id','id');
    }


    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id','id');
    }


    
    
    public function studentsubject(){
        return $this->belongsTo(AssignStudentSubject::class,'subject_id','subject_id');
    }



}
