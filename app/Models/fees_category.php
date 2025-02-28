<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fees_category extends Model
{
    protected $guarded = [];


    public function fee_category_amount(){
    	return $this->belongsTo(Fees_Category_Amount::class,'fee_category_id','id');
    }



}
