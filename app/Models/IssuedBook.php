<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssuedBook extends Model
{
    protected $guarded = [];


    
public function student(){
    return $this->belongsTo(Students::class,'student_id','id');
    }
    
    
    
    public function book(){
        return $this->belongsTo(Books::class,'book_id','id');
    }
    
    
    
    public function author()
    {
        return $this->belongsTo(authors::class,'author_id','id');
    }
    
    public function category()
    {
        return $this->belongsTo(book_category::class,'category_id','id');
    }
    


}
