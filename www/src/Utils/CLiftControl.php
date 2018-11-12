<?php

namespace App\Utils;

use App\Entity\{LiftOrders, Lifts};
use App\Interfaces\ILiftControl;
use Doctrine\ORM\EntityManagerInterface;


class CLiftControl implements ILiftControl{

    private $em;
    private $maxFloor;

    /**
     * ILiftControl constructor.
     * @param int $maxFloor
     * @param EntityManagerInterface $em
     */
    public function __construct(int $maxFloor, EntityManagerInterface $em)
    {
        $this->maxFloor = $maxFloor;
        $this->em = $em;
    }

    /**
     * @param int $floor
     * @return LiftOrders
     */
    public function callLift(int $floor): LiftOrders
    {
        if($floor>$this->maxFloor||$floor<1) return null;

        $entityManager = $this->em;

        $nearestLift = $this->em
            ->getRepository(Lifts::class)
            ->getMinDifferenceFloors($floor);

        $liftOrder = new LiftOrders();

        $liftOrder->setFloor($floor)
            ->setLift($nearestLift);

        $entityManager->persist($liftOrder);

        $nearestLift->setFloor($floor);

        $entityManager->persist($nearestLift);

        $entityManager->flush();

        return $liftOrder;

    }
}

