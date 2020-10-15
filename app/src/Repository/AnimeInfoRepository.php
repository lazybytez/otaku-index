<?php

namespace App\Repository;

use App\Entity\AnimeInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeInfo[]    findAll()
 * @method AnimeInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeInfo::class);
    }

    // /**
    //  * @return AnimeInfo[] Returns an array of AnimeInfo objects
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
    public function findOneBySomeField($value): ?AnimeInfo
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
