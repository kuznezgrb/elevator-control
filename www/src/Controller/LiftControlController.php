<?php

namespace App\Controller;

use App\Entity\Lifts;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\{ Request, Response};
use App\Utils\CLiftControl;

class LiftControlController extends FOSRestController
{

    /**
     * @Rest\Get("/lift-control/callLift/{floor}", name="callLift")
     * @param Request $request
     * @return View
     */
    public function callLift(int $floor): View
    {
        //$floor = $request->get('floor');

        $manager = $this->getDoctrine()->getManager();

        $liftControl = new CLiftControl(10, $manager);

        $liftOrder = $liftControl->callLift($floor);
        $liftControl->callLift(1);

       return View::create($liftOrder, Response::HTTP_OK);
    }

    /**
     * @Rest\Get("/lift-control/maxFloor/", name="getMaxFloor")   
     * @return View
     */
    public function getMaxFloor(): View
    {
        return View::create([ 'maxFloor'=>10 ], Response::HTTP_OK);
    } 

}
