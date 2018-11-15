<?php

namespace App\Controller;

use App\Entity\Lifts;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\{ Request, Response};
use App\Utils\CLiftControl;
use App\Utils\СLiftRedis;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

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


        $lifts = $this->getDoctrine()
            ->getRepository(Lifts::class)
            ->findBy([], [ 'number' => 'ASC']);


        $normalizer = new ObjectNormalizer();
        $normalizer->setIgnoredAttributes(array('age'));
        $encoder = new JsonEncoder();
        $serializer = new Serializer(array($normalizer), array($encoder));

        $redis = new СLiftRedis();
        $redis->setListsRedis($serializer->serialize($lifts, 'json'));




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
