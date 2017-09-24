<?php

namespace App\Http\Controllers\Gym;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\GymService;

class GymController extends Controller
{

    private $gymService;

    public function __construct(GymService $gymService)
    {
        $this->middleware('auth');
        $this->gymService = $gymService;
    }

    public function index()
    {
        $gyms = $this->gymService->getGymList();
        return view("gym.gyms")->with(array("gyms" => $gyms));
    }

    public function create()
    {
        return view("gym.gym-create");
    }

    public function store(Request $request)
    {
        $result = $this->gymService->createGym($request);
        $gyms = $this->gymService->getGymList();

        return view("gym.gyms")->with(array("gyms" => $gyms, "savingResult" => $result));
    }

    public function edit($gid)
    {
        $gym = $this->gymService->getGym($gid);
        return view("gym.gym-edit")->with(array("gym" => $gym));
    }

    public function save(Request $request)
    {
        $result = $this->gymService->updateGym($request);
        $gyms = $this->gymService->getGymList();
        return view("gym.gyms")->with(array("gyms" => $gyms, "savingResult" => $result));
    }

    public function details($gid)
    {
        $gym = $this->gymService->getGym($gid);
        return view("gym.gym", compact("gym"));
    }
}
