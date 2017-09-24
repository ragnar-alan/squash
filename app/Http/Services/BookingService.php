<?php

namespace App\Http\Services;

use App\Http\Models\Reservations;
use App\Http\Models\Gyms;
use App\Http\Services\GymService;
use App\Http\Services\UserService;
use App\Http\Services\ParticipantsService;
use stdClass;

class BookingService
{

    private $userService;
    private $gymService;
    private $participantService;

    public function __construct(UserService $userService, GymService $gymService, ParticipantsService $participantService)
    {
        $this->userService = $userService;
        $this->gymService = $gymService;
        $this->participantService = $participantService;
    }


    public function getDatasToReservationForm() {
        $data = new StdClass();
        
        $data->gyms = $this->gymService->getGymList();
        $data->users = $this->userService->getUsers();
        return $data;
    }

    public  function createReservation($request)
    {
        $reservation = new Reservations();
        $reservation->gym = $request->gym;
        $reservation->ticket_id = $request->ticket_id;
        $reservation->court_number = $request->court;
        $reservation->rdate = $request->rdate;
        $reservation_result = $reservation->save();

        
        $participants_result = $this->participantService->addUsersToReservation($request, $reservation->rid);
        if ($reservation_result == true && $participants_result == true ) {
            return true;
        }
        return false;
    }

    public function getReservations()
    {
        return Reservations::active()->get();
    }
}