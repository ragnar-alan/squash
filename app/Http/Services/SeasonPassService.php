<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2017. 09. 23.
 * Time: 23:33
 */

namespace App\Http\Services;


use App\Http\Models\SeasonPasses;
use GuzzleHttp\Psr7\Request;

class SeasonPassService
{
    private $gymService;

    public function __construct(GymService $gymService) {
        $this->gymService = $gymService;
    }

    public function getSeasonPasses()
    {
        return SeasonPasses::active()->get();
    }

    public function createSessoionPass($request)
    {
        $session_pass = new SeasonPasses();
        $session_pass->ticket_name = $request->name;
        $session_pass->gym = $this->getGymName($request->gym);
        $session_pass->valid_from = $request->valid_from;
        $session_pass->valid_to = $request->valid_to;
        $session_pass->occasions = $request->occasions;
        $session_pass->full_price = $request->full_price;
        return $session_pass->save();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getGymName($gid)
    {
        $gym = $this->gymService->getGym($gid);
        return $gym->gym_name;
    }

    public function getSeasonPass($gym)
    {
        return SeasonPasses::active()->valid()
            ->where('gym',$gym)->get();
    }
}