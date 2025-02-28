<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class school_clinic extends Model
{
    protected $guarded = [];



    
public function student(){
    return $this->belongsTo(Students::class,'student_id','id');
    }
    
    
    
    public function medicine(){
        return $this->belongsTo(Medicines::class,'medicine_id','id');
    } 
    



}
