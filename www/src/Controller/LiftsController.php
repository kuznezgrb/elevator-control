<?php

namespace App\Controller;

use App\Entity\Lifts;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\{ Request, Response};

class LiftsController extends FOSRestController
{
    /**
     * @Rest\Get("/lifts", name="lifts")
     */
    public function getLifts()
    {
        $lifts = $this->getDoctrine()
            ->getRepository(Lifts::class)
            ->findAll();

        return View::create($lifts, Response::HTTP_OK);
    }
}
