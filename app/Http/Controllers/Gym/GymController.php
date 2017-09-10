<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\GymService;
use Illuminate\Support\Facades\Input;

class GymController extends Controller
{
    public function index()
    {
        $gyms = GymService::getGymList();
        return view("gym.gyms")->with(array("gyms" => $gyms));
    }

    public function create()
    {
        return view("gym.gym-create");
    }

    public function store(Request $request)
    {
        $result = GymService::createGym($request);
        $gyms = GymService::getGymList();

        return view("gym.gyms")->with(array("gyms" => $gyms, "savingResult" => $result));
    }

    public function edit($gid)
    {
        $gym = GymService::getGym($gid);
        return view("gym.gym-edit")->with(array("gym" => $gym));
    }

    public function save(Request $request)
    {
        $result = GymService::updateGym($request);
        $gyms = GymService::getGymList();
        return view("gym.gyms")->with(array("gyms" => $gyms, "savingResult" => $result));
    }
}
