<?php

namespace App\Services;


use App\Models\lessons;

/**
 * Class CalenderService
 * @package App\Services
 */
class CalenderService
{




    public function generateCalendarData($weekDays)
    {
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $lessons   = lessons::with('user')->calendarByRoleOrClassId()->get();

        foreach ($timeRange as $time)
        {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];

            foreach ($weekDays as $index => $day)
            {
                $lesson = $lessons->where('day', $index)->where('start_time', $time['start'])->first();

                if ($lesson)
                {
                    array_push($calendarData[$timeText], [
                        'class_name'   => $lesson->class,
                        'term_name'   => $lesson->term,
                        'start'   => $lesson->start_time,
                        'end'   => $lesson->end_time,
                        'teacher_name' => $lesson->user->name,
                        'subject_name' => $lesson->subject->name,
                        'rowspan'      => $lesson->difference/30 ?? ''
                    ]);
                }
                else if (!$lessons->where('weekday', $index)->where('start_time', '<', $time['start'])->where('end_time', '>=', $time['end'])->count())
                {
                    array_push($calendarData[$timeText], 1);
                }
                else
                {
                    array_push($calendarData[$timeText], 0);
                }
            }
        }

        return $calendarData;
    }




}