<?php

namespace App\Http\Services;

use App\Http\Models\Reservations;
use stdClass;

class BookingService
{

    private $userService;
    private $gymService;
    private $seasonPassService;
    private $participantService;
    private $googleService;

    public function __construct(UserService $userService, GymService $gymService, ParticipantsService $participantService, SeasonPassService $seasonPassService, GoogleService $googleService)
    {
        $this->userService = $userService;
        $this->gymService = $gymService;
        $this->participantService = $participantService;
        $this->seasonPassService = $seasonPassService;
        $this->googleService = $googleService;
    }


    public function getDatasToReservationForm() {
        $data = new StdClass();
        
        $data->gyms = $this->gymService->getGymList();
        $data->users = $this->userService->getUsers();
        $data->passes = $this->seasonPassService->getSeasonPasses();
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

        $participants = $this->userService->getParticipants($request->get("participants"));
        $this->googleService->createCalendarEvents($participants, $reservation);

        $participants_result = $this->participantService->addUsersToReservation($request, $reservation->rid);
        if ($reservation_result == true && $participants_result == true ) {
            return true;
        }
        return false;
    }

    public function getReservations()
    {
        return Reservations::active()
            ->get();
    }

    public function getReservation($rid)
    {
        return Reservations::active()
            ->valid()
            ->where("rid", $rid)
            ->first();
    }
}