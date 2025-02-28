<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subject_competency extends Model
{
    protected $guarded = [];


    public function school_subject(){
        return $this->belongsTo(School_Subjects::class,'subject_id','id');
     }
     


}
