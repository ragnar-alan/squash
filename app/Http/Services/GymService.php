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
    public static function getGymList()
    {
        return Gyms::whereNull('deleted_at')->get();
    }

    public static function createGym($request)
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
}