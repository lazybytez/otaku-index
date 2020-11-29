<?php

namespace App\Repository;

use App\Entity\AnimeEpisodeTitle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeEpisodeTitle|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeEpisodeTitle|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeEpisodeTitle[]    findAll()
 * @method AnimeEpisodeTitle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeEpisodeTitleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeEpisodeTitle::class);
    }

    // /**
    //  * @return AnimeEpisodeTitle[] Returns an array of AnimeEpisodeTitle objects
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
    public function findOneBySomeField($value): ?AnimeEpisodeTitle
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
