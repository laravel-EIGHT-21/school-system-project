<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class purchase_stocks extends Model
{
    


    protected $guarded = [];

            
    public function product(){
        return $this->belongsTo(purchases::class,'purchase_id','id');
    }



}
