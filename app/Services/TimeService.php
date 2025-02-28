<?php

namespace App\Services;


use Carbon\Carbon;


/**
 * Class TimeService
 * @package App\Services
 */
class TimeService
{



    public function generateTimeRange($from, $to)
    {
        $time = Carbon::parse($from);
        $timeRange = [];

        do 
        {
            array_push($timeRange, [
                'start' => $time->format("H:i"),
                'end' => $time->addMinute(30)->format("H:i"),
            ]);    
        } while ($time->format("H:i") !== $to);

        return $timeRange;
    }




}