<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2018. 02. 27.
 * Time: 23:05
 */

namespace App\Http\Domain;


class EventBuilder
{
    private $summary;
    private $location;
    private $description;
    private $start;
    private $end;
    private $timeZone;
    private $attandees;
    private $haveReminders;
    private $reminders;

    /**
     * @param mixed $summary
     * @return EventBuilder
     */
    public function setSummary($summary): EventBuilder
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @param mixed $location
     * @return EventBuilder
     */
    public function setLocation($location): EventBuilder
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @param mixed $description
     * @return EventBuilder
     */
    public function setDescription($description): EventBuilder
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $start
     * @return EventBuilder
     */
    public function setStart($start): EventBuilder
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @param mixed $end
     * @return EventBuilder
     */
    public function setEnd($end): EventBuilder
    {
        $this->end = $end;
        return $this;
    }

    /**
     * @param mixed $timeZone
     * @return EventBuilder
     */
    public function setTimeZone($timeZone): EventBuilder
    {
        $this->timeZone = $timeZone;
        return $this;
    }

    /**
     * @param mixed $attandees
     * @return EventBuilder
     */
    public function setAttandees($attandees): EventBuilder
    {
        $this->attandees = $attandees;
        return $this;
    }

    /**
     * @param mixed $haveReminders
     * @return EventBuilder
     */
    public function setHaveReminders($haveReminders): EventBuilder
    {
        $this->haveReminders = $haveReminders;
        return $this;
    }

    /**
     * @param mixed $reminders
     * @return EventBuilder
     */
    public function setReminders($reminders): EventBuilder
    {
        $this->reminders = $reminders;
        return $this;
    }

    public function buildToArray($haveReminders = true)
    {
        $event =  [
        "summary"  =>  $this->summary,
        "location"  =>  $this->location,
        "description"  =>  $this->description,
        "start"  =>  $this->start,
        "end"  =>  $this->end,
        "timeZone"  =>  $this->timeZone,
        "attandees"  =>  $this->attandees
        ];

        if ($haveReminders) {
            array_add($event, "reminders", $this->reminders);
        }
        return $event;
    }
}