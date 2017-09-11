<?php

namespace App\Http\Controllers\SessionPass;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\GymService;

class SessionPassController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list() 
    {
        return view("sessionpass.sessionpass-list");
    }

    public function create() 
    {
        $gyms = GymService::getGymList();
        return view("sessionpass.sessionpass-create")->with("gyms",$gyms);
    }

    public function store()
    {
        return null;
    }
}
