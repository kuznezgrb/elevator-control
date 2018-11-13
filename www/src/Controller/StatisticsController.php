<?php

namespace App\Controller;

use App\Entity\LiftOrders;
use App\Entity\Lifts;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\{ Request, Response};

class StatisticsController extends FOSRestController
{
     /**
     * @Rest\Get("/statistics/statLiftCount", name="statLiftCount")
     * @return View
     */
    public function getStatLiftCount(): View
    {
        $statLiftCount = $this->getDoctrine()
            ->getRepository(LiftOrders::class)
            ->getStatLiftCount();

        return View::create($statLiftCount, Response::HTTP_OK);
    }

    /**
     * @Rest\Get("/statistics/statLiftDirection", name="statLiftDirection")
     * @return View
     */
    public function getStatLiftDirection(): View
    {
        $statLiftDirection = $this->getDoctrine()
            ->getRepository(LiftOrders::class)
            ->getStatLiftDirection();

        return View::create($statLiftDirection, Response::HTTP_OK);
    }
}
