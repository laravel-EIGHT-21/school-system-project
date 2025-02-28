<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class competency_marks extends Model
{
    protected $guarded = [];


    public function student(){
        return $this->belongsTo(students::class, 'student_id','id');
        }
        
        public function assign_subject_teacher(){
        return $this->belongsTo(assign_teacher_subject::class, 'subject_id','id');
        }
        
        
        public function school_subject(){
           return $this->belongsTo(school_subjects::class,'subject_id','id');
        }
        

    public function competency(){
        return $this->belongsTo(subject_competency::class,'competency_id','id');
        
    }
    



}
