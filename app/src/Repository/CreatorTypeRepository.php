<?php

namespace App\Repository;

use App\Entity\CreatorType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CreatorType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreatorType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreatorType[]    findAll()
 * @method CreatorType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreatorTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreatorType::class);
    }

    // /**
    //  * @return CreatorType[] Returns an array of CreatorType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CreatorType
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
