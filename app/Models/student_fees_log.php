<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student_fees_log extends Model
{
    protected $guarded = [];



    public function fees_pay(){
    	return $this->belongsTo(student_fees::class,'fees_pay_id','id');
    }



    public function student(){
    	return $this->belongsTo(Students::class,'student_id','id');
    
    }


    public function fee_category(){
    	return $this->belongsTo(Fees_Category::class,'fee_category_id','id');
    }


}
