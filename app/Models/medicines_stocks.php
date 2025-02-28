<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class medicines_stocks extends Model
{
    

    protected $guarded = [];


    
    public function medicine()
    {
        return $this->belongsTo(Medicines::class,'medicine_id','id');
    }




}
