<?php

namespace App\Controller;

use App\Entity\LiftOrders;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LiftOrdersController extends AbstractController
{
    /**
     * @Route("/lift-orders/{id}", name="lift_orders")
     */
    public function getLiftOrder(int $id)
    {
        $liftOrder = $this->getDoctrine()
        ->getRepository(LiftOrders::class)
        ->find($id);

        if (!$liftOrder) {
            throw $this->createNotFoundException(
                'No found '
            );
        }

        return $this->json([
            'status' => 200,
            'data' => [
                'id'=> $liftOrder->getId(),
                'floor' => $liftOrder->getFloor(),
                'lift' => $liftOrder->getLift()->getId()
            ]
        ]);
    }
}
