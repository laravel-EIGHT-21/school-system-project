<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bookstocks extends Model
{
    protected $guarded = [];


    public function book()
    {
        return $this->belongsTo(books::class,'book_id','id');
    }



    
    public function category()
    {
        return $this->belongsTo(book_category::class,'category_id','id');
    }



    public function supplier()
    {
        return $this->belongsTo(Suppliers::class,'supplier_id','id');
    }





}
