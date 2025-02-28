<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $guarded = [];


    
    public function author()
    {
        return $this->belongsTo(authors::class,'author_id','id');
    }

    public function category()
    {
        return $this->belongsTo(book_category::class,'category_id','id');
    }


}
