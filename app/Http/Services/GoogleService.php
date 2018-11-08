<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2018. 02. 27.
 * Time: 20:49
 */

namespace App\Http\Services;


use App\Http\Domain\EventBuilder;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleService
{

    protected $calendarService;
    static private $summary = "STM: Squash appointment";
    static private $timeZone = "Europe/Budapest";
    private $gymService;

    public function __construct(GymService $gymService)
    {
        $this->gymService = $gymService;
    }

    public function createCalendarEvents($participants, $reservation)
    {

        echo "<pre>";
        var_dump(session("GoogleCode"));
        echo "<br>";
        var_dump(session("gtoken"));
        echo "</pre>";
        dd();
        $user = Socialite::driver('github')->userFromToken(session("GoogleCode"));

        // Set token for the Google API PHP Client
        $google_client_token = [
            'access_token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'expires_in' => $user->expiresIn
        ];
        $client = new Google_Client();
        $client->setApplicationName("Squash Time Management");
        $client->setClientId("818925611138-t8egvk0hu1q0iu6bn4vfri2sg7md0cmp.apps.googleusercontent.com");
        $client->setClientSecret("6uVBBFuo04IB_GXd0F7fA6JK");
        $client->setAccessToken($google_client_token);
        $client->setDeveloperKey("AIzaSyB0pkrrKnMh4051dqFe0T2T5Uul2r7C6ZE");

        //$client->fetchAccessTokenWithAuthCode($httpRequest->session()->get("_token"));

        $players = $this->getReserveeAndPartnerUser($participants);
        $eventArray = $this->buildEvent($players["reservee"], $players["participant"], $reservation);
        $this->calendarService = new Google_Service_Calendar($client);
        $event = new Google_Service_Calendar_Event($eventArray);
        $this->calendarService->events->insert("cal_id", $event);
    }

    private function getReserveeAndPartnerUser($participants)
    {
        if (Auth::check()) {
            $loggedInUser = Auth::user();
        }

        $playerTwo = null;
        foreach ($participants as $participant) {
            if ($participant->email != $loggedInUser->email) {
                $playerTwo = $participant;
            }
        }

        return [
            "reservee" => $loggedInUser,
            "participant" => $playerTwo
        ];
    }

    private function buildEvent($reservee, $attandee, $reservation)
    {
        $builder = new EventBuilder();
        $dates = $this->getDates($reservation->rdate);
        $builder->setSummary(self::$summary)
            ->setLocation($this->gymService->getGymByName($reservation->gym))
            ->setDescription($this->getDescripton($reservee, $attandee, $reservation))
            ->setAttandees(array(array("email" => $attandee)))
            ->setStart(array(
                "dateTime"  => $dates["start"],
                "timeZone"  =>  self::$timeZone
            ))
            ->setEnd(array(
                "dateTime"  => $dates["end"],
                "timeZone"  =>  self::$timeZone
            ))
            ->setReminders(
                array(
                    'useDefault' => true
                )
            );
        return $builder->buildToArray(true);
    }

    private function getDescripton($reservee, $attandee, $reservation)
    {
        $gym = $reservation->gym;
        $startTime = Carbon::parse($reservation->rdate);
        $endTime = $startTime->addHour(1)->format("H:i");
        $startTime = $startTime->format("H:i");
        $courtNumber = $reservation->court_number;

        return $this->createDescription($gym,$startTime,$endTime,$courtNumber,$reservee,$attandee);
    }

    private function getDates($startDate)
    {
        $start = Carbon::parse($startDate);
        $end = $start->addHour(1);
        $dates['start'] = $start->toAtomString();
        $dates['end'] = $end->toAtomString();
        return $dates;
    }

    private function createDescription($gym,$startDate,$endDate,$courtNumber,$reservee,$attandee)
    {
        return "
        Squasholjunk egy órát itt: ". $gym ." <br>
        Erre az időre van foglalt pályánk: ". $startDate ." - ". $endDate ." <br><br>

        A pálya száma: ". $courtNumber ." <br><br>

        Ő foglalta az STM-en: ". $reservee->name ." <br>
        A partnere pedig: ". $attandee->name ." <br><br>

        Jó játékot! :)";
    }
}