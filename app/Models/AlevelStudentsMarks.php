<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlevelStudentsMarks extends Model
{

    protected $guarded = [];


    public function alevelstudent(){
        return $this->belongsTo(students::class,'student_id','id');
    }
    
    
    public function student_subjects(){ 
    return $this->belongsTo(AssignStudentSubject::class, 'subject_id','id');
    }
    
    public function year(){
    return $this->belongsTo(year::class, 'year_id','id');
    }
    
    public function student_class(){
    return $this->belongsTo(classes::class, 'class_id','id');
    }
    
    public function exam_type(){
    return $this->belongsTo(Exam_Types::class, 'exam_type_id','id');
    }
    

             
    public function term(){
        return $this->belongsTo(Terms::class, 'term_id','id');
        }


}
