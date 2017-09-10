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

    public static function getGym($gid)
    {
        return Gyms::whereNull('deleted_at')
            ->where('gid',$gid)
            ->first();
    }

    public static function updateGym($gym)
    {
        $oriGym = Gyms::where('gid',$gym->gid)->first();

        $oriGym->gym_name = $gym->name;
        $oriGym->city = $gym->city;
        $oriGym->zip_code = $gym->zipcode;
        $oriGym->street = $gym->street;
        $oriGym->number = $gym->number;
        $oriGym->number_of_courts = $gym->courts;
        $oriGym->discount_type = $gym->discount;
        return $oriGym->save();
    }
}