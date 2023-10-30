<?php

use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\BookingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('/');

Route::get('/about', function () {
    return view('about');
});

Route::get('/booking', function () {
    return view('bookings');
});

Route::post('/getBookings', [SchedulesController::class, 'getCurrentBookingsSchedule']);

Route::post('/addBooking', [BookingsController::class, 'addBooking'])->name('addBooking');
