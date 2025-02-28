<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lessonstable extends Model
{
    



    protected $guarded = [];


    
    public function class(){
        return $this->belongsTo(Classes::class,'class_id','id');
    }

    
    
    public function year(){
        return $this->belongsTo(Year::class,'year_id','id');
    }
      
    
        public function term(){
            return $this->belongsTo(terms::class,'term_id','id');
         }



         public function session(){
            return $this->belongsTo(class_sessions::class,'session_id','id');
         }
    

 
         public function subject(){
            return $this->belongsTo(School_Subjects::class,'subject_id','id');
        }


        
        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }





        
    const WEEK_DAYS = [
        'Monday' => 'Monday',
        'Tuesday' => 'Tuesday',
        'Wednesday' => 'Wednesday',
        'Thursday' => 'Thursday',
        'Friday' => 'Friday',
        'Saturday' => 'Saturday',
        'Sunday' => 'Sunday',
    ];




}
