<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\GymService;
use Illuminate\Support\Facades\Input;

class GymController extends Controller
{
    
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gyms = GymService::getGymList();
        return view("gym.gyms")->with(array("gyms" => $gyms));
    }

    public function create()
    {
        return view("gym.gym-create");
    }

    public function save(Request $request)
    {
        $result = GymService::createGym($request);
        $gyms = GymService::getGymList();

        return view("gym.gyms")->with(array("gyms" => $gyms, "savingResult" => $result));
    }
}
