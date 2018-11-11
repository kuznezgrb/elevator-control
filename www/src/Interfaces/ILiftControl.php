<?php

namespace App\Interfaces;

/**
 * Interface ILiftControl
 * @package App\Interfaces
 */
interface ILiftControl
{    

    /**
     * callLift
     *
     * @param int $floor
     *
     * @return mixed id order
     */
    public function callLift(int $floor);

}