<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expenses_log extends Model
{
    protected $guarded = [];

        
    public function expense(){
    	return $this->belongsTo(expenses::class,'expense_id','id');
    }



}
