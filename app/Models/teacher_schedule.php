<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher_schedule extends Model
{
    protected $guarded = [];



    public function student_class(){
        return $this->belongsTo(classes::class,'class_id','id');
    }
    
    
    
    public function assign_subject_teacher(){
        return $this->belongsTo(assign_teacher_subject::class, 'subject_id','id');
        }
    
    
        public function school_term(){
            return $this->belongsTo(terms::class,'term_id','id');
         }
    
    
         public function class_session(){
            return $this->belongsTo(Class_Sessions::class,'class_session_id','id');
         }
    
    
    
         public function school_subject(){
            return $this->belongsTo(school_subjects::class,'subject_id','id');
        }
    
    
    
        public function user(){
            return $this->belongsTo(User::class,'employee_id','id');
        }
    


}
