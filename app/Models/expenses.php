<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    protected $guarded = [];

    
    
    public function category(){
    return $this->belongsTo(Expenses_Category::class, 'category_id','id');
    }


}
