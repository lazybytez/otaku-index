<?php

namespace App\Repository;

use App\Entity\AnimeEpisode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeEpisode|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeEpisode|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeEpisode[]    findAll()
 * @method AnimeEpisode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeEpisodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeEpisode::class);
    }

    // /**
    //  * @return AnimeEpisode[] Returns an array of AnimeEpisode objects
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
    public function findOneBySomeField($value): ?AnimeEpisode
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
