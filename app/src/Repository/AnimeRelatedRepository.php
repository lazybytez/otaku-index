<?php

namespace App\Repository;

use App\Entity\AnimeRelated;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeRelated|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeRelated|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeRelated[]    findAll()
 * @method AnimeRelated[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeRelatedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeRelated::class);
    }

    // /**
    //  * @return AnimeRelated[] Returns an array of AnimeRelated objects
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
    public function findOneBySomeField($value): ?AnimeRelated
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
