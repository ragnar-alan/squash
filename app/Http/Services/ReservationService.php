<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2018. 02. 06.
 * Time: 21:30
 */

namespace App\Http\Services;


use App\Http\Models\Reservations;
use App\Http\Models\SeasonPasses;

class ReservationService
{
    public function getRemainingOccasions(SeasonPasses $pass)
    {
        $usedOccasions = Reservations::where("ticket_id", $pass->tid)
            ->count();
        $remainingOccasions = $pass->occasions - $usedOccasions;
        if ($remainingOccasions <= 0) {
            return 0;
        }
        return $remainingOccasions;
    }
}