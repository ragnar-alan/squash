<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\GymService;

class BookingController extends Controller
{
    private $data = [];

    public function book()
    {
        $data['gyms'] = GymService::getGymList();
//        $appointments = AppointmentService::getAppointments();
        return view('booking.book', compact($data));
    }
}
