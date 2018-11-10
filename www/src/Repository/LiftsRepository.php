<?php

namespace App\Repository;

use App\Entity\Lifts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lifts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lifts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lifts[]    findAll()
 * @method Lifts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiftsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lifts::class);
    }

    // /**
    //  * @return Lifts[] Returns an array of Lifts objects
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
    public function findOneBySomeField($value): ?Lifts
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
