<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingService;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function book()
    {
        $data = BookingService::getDatasToReservationForm();
        return view('booking.book')->with("datas", $data);
    }

    public function store(BookingRequest $request)
    {
        $data = BookingService::getDatasToReservationForm();
        $result = BookingService::createReservation($request);
        if (!$result) {
            return redirect()->back();
        }
        return view("booking.book")->with("datas", $data);
    }

    public function list() {
        $data = BookingService::getReservations();
        return view("booking.book-list")->with("datas", $data);
    }
}
