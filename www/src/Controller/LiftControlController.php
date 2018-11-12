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
     * @Rest\Post("/lift-control/callLift/", name="callLift")
     * @param Request $request
     * @return View
     */
    public function callLift(Request $request): View
    {
        $floor = $request->get('floor');

        $manager = $this->getDoctrine()->getManager();

        $liftControl = new CLiftControl(10, $manager);

        $liftOrder = $liftControl->callLift($floor);

       return View::create($liftOrder, Response::HTTP_OK);

    }
}
