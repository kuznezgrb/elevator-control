<?php

namespace App\Interfaces;

use App\Entity\LiftOrders;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Interface ILiftControl
 * @package App\Interfaces
 */
interface ILiftControl
{

    /**
     * ILiftControl constructor.
     * @param int $maxFloor
     * @param EntityManagerInterface $em
     */
    public function __construct(int $maxFloor, EntityManagerInterface $em);

    /**
     * @param int $floor
     * @return LiftOrders
     */
    public function callLift(int $floor):LiftOrders;

}