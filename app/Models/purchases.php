<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class purchases extends Model
{
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Purchase_Category::class,'category_id','id');
    }




}
