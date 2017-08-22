<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2017. 08. 20.
 * Time: 1:32
 */

namespace App\Http\Services;

use App\Http\Models\Participants;

class ParticipantsService
{
    public static function addUsersToReservation($request, $reservation_id) {
        foreach($request->participants as $uid){
            $result = static::addParticipants($uid, $reservation_id);
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    public static function addParticipants($uid, $reservation_id)
    {
        $participants = new Participants();
        $participants->uid = $uid;
        $participants->reservation_id = $reservation_id;
        return $participants->save();
    }
}