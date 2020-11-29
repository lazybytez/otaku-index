<?php

namespace App\Repository;

use App\Entity\RelatedType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RelatedType|null find($id, $lockMode = null, $lockVersion = null)
 * @method RelatedType|null findOneBy(array $criteria, array $orderBy = null)
 * @method RelatedType[]    findAll()
 * @method RelatedType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RelatedTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RelatedType::class);
    }

    // /**
    //  * @return RelatedType[] Returns an array of RelatedType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RelatedType
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
