<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Interfaces\ILiftControl;
use App\Entity\{ Lifts, LiftOrders };

class LiftControlController extends AbstractController implements ILiftControl
{

    /**
     * callLift
     *
     * @Route("/lift/control/{floor}", name="lift_control")
     * @param int $floor
     *
     * @return mixed id order
     */
    public function callLift(int $floor)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $nearestLift = $this->getDoctrine()
            ->getRepository(Lifts::class)
            ->getMinDifferenceFloors(10);

        $liftOrder = new LiftOrders();

        $liftOrder->setFloor(10)
            ->setLift($nearestLift);

        $entityManager->persist( $liftOrder);

        $entityManager->flush();



        return $this->json([
            'status' => '200',
            'data' =>  $nearestLift
        ]);
    }
}
