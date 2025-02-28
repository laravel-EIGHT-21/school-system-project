<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class lessons extends Model
{
    protected $guarded = [];


 
         public function subject(){
            return $this->belongsTo(school_subjects::class,'subject_id','id');
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




        public function getDifferenceAttribute()
        {
            return Carbon::parse($this->end_time)->diffInMinutes($this->start_time);
        }
    
        public function getStartTimeAttribute($value)
        {
            return $value ? Carbon::createFromFormat('H:i:s', $value)->format(config('panel.lesson_time_format')) : null;
        }
    
        public function setStartTimeAttribute($value)
        {
            $this->attributes['start_time'] = $value ? Carbon::createFromFormat(config('panel.lesson_time_format'),
                $value)->format('H:i:s') : null;
        }
    
        public function getEndTimeAttribute($value)
        {
            return $value ? Carbon::createFromFormat('H:i:s', $value)->format(config('panel.lesson_time_format')) : null;
        }
    
        public function setEndTimeAttribute($value)
        {
            $this->attributes['end_time'] = $value ? Carbon::createFromFormat(config('panel.lesson_time_format'),
                $value)->format('H:i:s') : null;
        }
    



        public static function isTimeAvailable($weekday, $startTime, $endTime, $class, $teacher, $lesson)
        {
            $lessons = self::where('weekday', $weekday)
                ->when($lesson, function ($query) use ($lesson) {
                    $query->where('id', '!=', $lesson);
                })
                ->where(function ($query) use ($class, $teacher) {
                    $query->where('class', $class)
                        ->orWhere('user_id', $teacher);
                })
                ->where([
                    ['start_time', '<', $endTime],
                    ['end_time', '>', $startTime],
                ])
                ->count();
    
            return !$lessons;
        }
    
        public function scopeCalendarByRoleOrClassId($query)
        {
            return $query->when(!request()->input('class'), function ($query) {
                $query->when(Auth::user()->status == 'active', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                });
                   
            })
                ->when(request()->input('class'), function ($query) {
                    $query->where('class', request()->input('class'));
                });
        }





}
