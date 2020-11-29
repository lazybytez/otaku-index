<?php

namespace App\Repository;

use App\Entity\AnimeCast;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeCast|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeCast|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeCast[]    findAll()
 * @method AnimeCast[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeCastRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeCast::class);
    }

    // /**
    //  * @return AnimeCast[] Returns an array of AnimeCast objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnimeCast
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
