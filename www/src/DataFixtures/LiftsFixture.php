<?php

namespace App\DataFixtures;

use App\Entity\Lifts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LiftsFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $liftFirstFloor =  random_int(1, 4);

        for($i=1;$i<5;$i++){
            $lift = new Lifts();
            $lift->setNumber($i);
            if($liftFirstFloor == $i) {
                $lift->setFloor(1);
            } else {
                $lift->setFloor(random_int(2, 10));
            }

            $manager->persist($lift);
        }
     
        $manager->flush();
    }
}
