<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    function getCurrentBookingsSchedule(Request $request) {
        // Access the data sent in the request
        $date = $request->all();

        // Perform data processing or other actions here
        $not_available_hours = Schedule::select('scheduled_time')
                                  ->where('scheduled_date', $date)
                                  ->get();

        // Return a response, for example:
        return response()->json(['booked_hours' => $not_available_hours]);
    }

    function addSchedule($date, $hour) {

        $schedule = Schedule::create([
            'scheduled_date' => $date,
            'scheduled_time' => $hour
        ]);

        return $schedule->id;
    }

    function getSchedulesByData($date) {
        $schedules = Schedule::select('id')->where('scheduled_date', $date);

        return $schedules;
    }
}
