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

    public static function getDatasToReservationForm() {
        $data = new StdClass();
        
        $data->gyms = GymService::getGymList();
        $data->users = UserService::getUsers();
        return $data;
    }

    public static function createReservation($request)
    {
        $reservation = new Reservations();
        $reservation->gym = $request->gym;
        $reservation->court_number = $request->court;
        $reservation->rdate = $request->rdate;
        $reservation_result = $reservation->save();

        
        $participants_result = ParticipantsService::addUsersToReservation($request, $reservation->rid);
        if ($reservation_result == true && $participants_result == true ) {
            return true;
        }
        return false;
    }

    public static function getReservations()
    {
        return Reservations::active()->get();
    }
}