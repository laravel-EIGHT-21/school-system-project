<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fees_category_amount extends Model
{
    protected $guarded = [];

    public function fee_cateogry(){
        return $this->belongsTo(fees_category::class,'fee_category_id','id');
    }



}
