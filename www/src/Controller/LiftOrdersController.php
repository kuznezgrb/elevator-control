<?php

namespace App\Controller;

use App\Entity\LiftOrders;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\{ Request, Response};

class LiftOrdersController extends FOSRestController
{
    /**
     * @Rest\Get("/lift-orders/{id}", name="lift_orders")
     * @param int $id
     * @return View
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

        return View::create($liftOrder, Response::HTTP_OK);
    }
}
