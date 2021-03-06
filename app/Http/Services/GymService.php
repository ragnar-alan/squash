<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2017. 08. 20.
 * Time: 1:32
 */

namespace App\Http\Services;

use App\Http\Models\Gyms;

class GymService
{
    public function getGymList()
    {
        return Gyms::whereNull('deleted_at')->get();
    }

    public function createGym($request)
    {
        $gym = new Gyms();
        $gym->gym_name = $request->name;
        $gym->city = $request->city;
        $gym->zip_code = $request->zipcode;
        $gym->street = $request->street;
        $gym->number = $request->number;
        $gym->number_of_courts = $request->courts;
        $gym->discount_type = $request->discount;
        $gym->save();
    }

    public function getGym($gid)
    {
        return Gyms::active()
            ->where('gid', $gid)
            ->first();
    }

    public function updateGym($gym)
    {
        $oriGym = Gyms::where('gid', $gym->gid)->first();

        $oriGym->gym_name = $gym->name;
        $oriGym->city = $gym->city;
        $oriGym->zip_code = $gym->zipcode;
        $oriGym->street = $gym->street;
        $oriGym->number = $gym->number;
        $oriGym->number_of_courts = $gym->courts;
        $oriGym->discount_type = $gym->discount;
        //@TODO when u update gym name don't forget about update season passes too (names)
        return $oriGym->save();
    }

    public function getGymByName($name)
    {
        return Gyms::where("gym_name", $name)->first();
    }
}