<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingService;
use App\Http\Services\SeasonPassService;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{

    private $bookingService;
    private $seasonPassService;

    public function __construct(BookingService $bookingService, SeasonPassService $seasonPassService)
    {
        $this->middleware('auth');
        $this->bookingService = $bookingService;
        $this->seasonPassService = $seasonPassService;
    }

    public function book()
    {
        $data = $this->bookingService->getDatasToReservationForm();
        return view('booking.book')->with("datas", $data);
    }

    public function store(BookingRequest $request)
    {
        $data = $this->bookingService->getDatasToReservationForm();
        $result = $this->bookingService->createReservation($request);
        if (!$result) {
            return redirect()->back();
        }
        return view("booking.book-list")->with("datas", $data);
    }

    public function getReservations() {
        $data = $this->bookingService->getReservations();
        return view("booking.book-list")->with("datas", $data);
    }

    public function getSeasonPassForGym(Request $request)
    {
        return $this->seasonPassService->getSeasonPass($request->gym);
    }
}
