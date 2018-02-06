<?php
/**
 * Created by PhpStorm.
 * User: boros
 * Date: 2018. 02. 06.
 * Time: 21:57
 */

namespace App\Http\Domain;


class SeasonPassVO
{
    private $seasonPass;
    private $occasionsLeft;

    /**
     * @return mixed
     */
    public function getSeasonPass()
    {
        return $this->seasonPass;
    }

    /**
     * @param mixed $seasonPass
     */
    public function setSeasonPass($seasonPass)
    {
        $this->seasonPass = $seasonPass;
    }

    /**
     * @return mixed
     */
    public function getOccasionsLeft()
    {
        return $this->occasionsLeft;
    }

    /**
     * @param mixed $occasionsLeft
     */
    public function setOccasionsLeft($occasionsLeft)
    {
        $this->occasionsLeft = $occasionsLeft;
    }


}