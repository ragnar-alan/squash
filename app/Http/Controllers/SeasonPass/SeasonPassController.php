<?php

namespace App\Http\Controllers\SeasonPass;

use App\Http\Services\SeasonPassService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\GymService;

class SeasonPassController extends Controller
{

    private $sessionPassService;
    private $gymService;

    public function __construct(SeasonPassService $sessionPassService, GymService $gymService)
    {
        $this->middleware('auth');
        $this->sessionPassService = $sessionPassService;
        $this->gymService = $gymService;
    }

    public function getSeasonpass()
    {
        $passes = $this->sessionPassService->getSeasonPasses();
        return view("seasonpass.seasonpass-list")->with(array("passes" => $passes));
    }

    public function create() 
    {
        $gyms = $this->gymService->getGymList();
        return view("seasonpass.seasonpass-create")->with("gyms",$gyms);
    }

    public function store(Request $request)
    {
        $result = $this->sessionPassService->createSessoionPass($request);
        $passes = $this->sessionPassService->getSeasonPasses();

        return view("seasonpass.seasonpass-list")->with(array("passes" => $passes));
    }
}
