<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2017. 09. 23.
 * Time: 23:33
 */

namespace App\Http\Services;


use App\Http\Domain\SeasonPassVO;
use App\Http\Models\SeasonPasses;

class SeasonPassService
{
    private $gymService;
    private $reservationService;

    public function __construct(GymService $gymService, ReservationService $reservationService) {
        $this->gymService = $gymService;
        $this->reservationService = $reservationService;
    }

    public function getSeasonPassesByGym($gym, $valid = true)
    {
        if ($valid == true) {
            $seasonPasses = SeasonPasses::where("gym", $gym)
                ->active()
                ->valid()
                ->get();
        } else {
            $seasonPasses = SeasonPasses::where("gym", $gym)
                ->active()
                ->get();
        }
        $result = $this->setPassesWithOccasions($seasonPasses);
        $response = $this->convertToArray($result);
        return $response;
    }

    public function getSeasonPasses($valid = true)
    {
        if ($valid == true) {
            $seasonPasses = SeasonPasses::active()->valid()->get();
        } else {
            $seasonPasses = SeasonPasses::active()->get();
        }
        $result = $this->setPassesWithOccasions($seasonPasses);
        return $result;
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

    public function getSeasonPassById($tid)
    {
        return SeasonPasses::active()->valid()
            ->where("tid",$tid)->first();
    }

    /**
     * @param $seasonPasses
     * @return mixed
     */
    private function setPassesWithOccasions($seasonPasses)
    {
        $result = array();
        foreach ($seasonPasses as $pass) {
            $occasionsLeft = $this->reservationService->getRemainingOccasions($pass);

            $seasonPassVo = new SeasonPassVO();
            $seasonPassVo->setSeasonPass($pass);
            $seasonPassVo->setOccasionsLeft($occasionsLeft);
            array_push($result, $seasonPassVo);
        }
        return $result;
    }

    private function convertToArray($convertable)
    {
        $result = array();
        foreach ($convertable as $item) {
            $result[] = [
                "ticket_name" => $item->getSeasonPass()->ticket_name,
                "tid" => $item->getSeasonPass()->tid,
                "occasions_left" => $item->getOccasionsLeft()
            ];
        }
        return $result;
    }
}