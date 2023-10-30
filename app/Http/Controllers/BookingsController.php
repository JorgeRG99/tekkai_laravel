<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TablesController;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Exception;

class BookingsController extends Controller
{
    function addBooking(Request $request, SchedulesController $scheduleCtrll, CustomersController $customerCtrll, TablesController $tablesCtrll) {
        //Creating Schedule
        $date = $request->date;
        $hour = $request->hour;

        $scheduleID = $scheduleCtrll->addSchedule($date, $hour);

        //Creating User
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $phone = $request->phone;
        $allergies = $request->allergies;

        $customerID = $customerCtrll->addCustomer($name, $surname, $email, $phone, $allergies);

        // Getting all tables
        $all_tables = $tablesCtrll->getTables();
        
        // Getting not available tables on date
        $schedules_IDs = $scheduleCtrll->getSchedulesByData($date);
        $bookedTables = Booking::select('tableID')->whereIn('scheduleID', $schedules_IDs)->pluck('tableID');

        //Deleting all the booked tables, the result is the not booked tables at the indicated date
        foreach($all_tables as $tableID) {
            if($bookedTables->contains($tableID)) {
                $all_tables->forget($all_tables->search($tableID));
            }
        }

        $selectedTable = $all_tables->random();

        //Creating booking in the DB
        $booking = Booking::create([
            'customerID' => $customerID,
            'tableID' => $selectedTable,
            'scheduleID' => $scheduleID
        ]);

        $data = [
            'subject'=>'Booking succesfully dated',
            'name'=>$name,
            'surname'=>$surname,
            'date'=>$date,
            'hour'=>$hour
        ];
        
        Mail::to($email)->send(new MailNotify($data));
        

        return redirect()->route('/', ['confirm' => true]);
    }
}
