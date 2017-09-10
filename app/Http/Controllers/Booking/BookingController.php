<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\GymService;
use stdClass;

class BookingController extends Controller
{
    public function book()
    {
        $data = new stdClass();
        $data->gyms = GymService::getGymList();
        return view('booking.book')->with("data", $data);
    }

    public function store(Request $request)
    {
//        $appointments = AppointmentService::getAppointments();
    }
}
