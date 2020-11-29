<?php

namespace App\Repository;

use App\Entity\AnimeList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeList|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeList|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeList[]    findAll()
 * @method AnimeList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeList::class);
    }

    // /**
    //  * @return AnimeList[] Returns an array of AnimeList objects
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
    public function findOneBySomeField($value): ?AnimeList
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
