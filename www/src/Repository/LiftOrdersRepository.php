<?php

namespace App\Repository;

use App\Entity\LiftOrders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LiftOrders|null find($id, $lockMode = null, $lockVersion = null)
 * @method LiftOrders|null findOneBy(array $criteria, array $orderBy = null)
 * @method LiftOrders[]    findAll()
 * @method LiftOrders[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiftOrdersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LiftOrders::class);
    }


    /**
     * @return mixed
     */
    public function  getStatLiftCount(){
        $liftOrders = $this->createQueryBuilder('f')
            ->getQuery()
            ->getResult();

        $movementIterations = [];

        foreach ($liftOrders as $liftOrder){

            $movementIterations[$liftOrder->getLift()->getNumber()][$liftOrder->getFloor()] = $movementIterations[$liftOrder->getLift()->getNumber()][$liftOrder->getFloor()]??0;

            $movementIterations[$liftOrder->getLift()->getNumber()][$liftOrder->getFloor()]++;
        }

        return $movementIterations;

    }


    /**
     * @return array
     */
    public function getStatLiftDirection(){
        $liftOrders = $this->createQueryBuilder('f')
            ->getQuery()
            ->getResult();
        $movementIterations = [];

        $buffer = [];
        $direction = [];

        foreach ($liftOrders as $liftOrder){
            $idLift = $liftOrder->getLift()->getId();
            $floor = $liftOrder->getFloor();

            $buffer[$idLift] = $buffer[$idLift]??[];

            $countBuffer = count($buffer[$idLift]);

            if($countBuffer > 1){

                $direction = gmp_sign($buffer[$idLift][$countBuffer-2]-$buffer[$idLift][$countBuffer-1]);

                $directionLift = gmp_sign($buffer[$idLift][$countBuffer-1]-$floor);

                $comparison = $directionLift <=> $direction;

                if($comparison == 0){
                    $buffer[$idLift][] = $floor;
                } else {
                    $movementIterations[$idLift][] = $buffer[$idLift];
                    $buffer[$idLift] = [];
                    $buffer[$idLift][] = $floor;
                }
            } else {
                $buffer[$idLift][] = $floor;
            }
        }

        foreach ($buffer as $lift=>$bufferItem){
           if(count($bufferItem)>0){
               $movementIterations[$lift][] = $bufferItem;
           }
        }


        return $movementIterations;

    }

    // /**
    //  * @return LiftOrders[] Returns an array of LiftOrders objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LiftOrders
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
