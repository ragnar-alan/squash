<?php

namespace App\Http\Controllers\Booking;

use App\Http\Services\ParticipantsService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Services\BookingService;
use App\Http\Services\SeasonPassService;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{

    private $bookingService;
    private $seasonPassService;
    private $participantsService;
    private $userService;

    public function __construct(BookingService $bookingService, SeasonPassService $seasonPassService, ParticipantsService $participantsService, UserService $userService)
    {
        $this->middleware('auth');
        $this->bookingService = $bookingService;
        $this->seasonPassService = $seasonPassService;
        $this->participantsService = $participantsService;
        $this->userService = $userService;
    }

    public function book()
    {
        $data = $this->bookingService->getDatasToReservationForm();
        return view('booking.book')->with("datas", $data);
    }

    public function store(BookingRequest $request)
    {
        $result = $this->bookingService->createReservation($request);
        $reservations = $this->bookingService->getReservations();
        if (!$result) {
            return redirect()->back();
        }
        return view("booking.book-list")->with("reservations", $reservations);
    }

    public function getReservations() {
        $reservations = $this->bookingService->getReservations();
        return view("booking.book-list")->with("reservations", $reservations);
    }

    public function getSeasonPassForGym(Request $request)
    {
        return $this->seasonPassService->getSeasonPassesByGym($request->gym);
    }

    public function details($rid)
    {
        $reservation = $this->bookingService->getReservation($rid);
        $participants = $this->userService->getParticipants($this->participantsService->getParticipants($rid));
        return view("booking.book-detail")->with(array("reservation" => $reservation, "participants" => $participants));
    }
}
