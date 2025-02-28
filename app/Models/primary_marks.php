<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class primary_marks extends Model
{
    



    protected $guarded = [];

    
    public function school_subject(){
        return $this->belongsTo(School_Subjects::class,'subject_id','id');
     }


public function student(){
    return $this->belongsTo(Students::class,'student_id','id');
}






}
