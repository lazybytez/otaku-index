<?php

namespace App\Repository;

use App\Entity\AnimeTitle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Flex\Unpack\Result;

/**
 * @method AnimeTitle|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeTitle|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeTitle[]    findAll()
 * @method AnimeTitle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeTitleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeTitle::class);
    }

    // /**
    //  * @return AnimeTitle[] Returns an array with all Anime data
    //  */
    // public function findAnimeTitlesById($value)
    // {
    //     return $this->createQueryBuilder('a')
    //         ->select("a.type")
    //         ->addSelect("a.language")
    //         ->addSelect("a.title")
    //         ->andWhere('a.aid = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('a.id', 'ASC')
    //         ->getQuery()
    //         ->getResult();
    // }

    // /**
    //  * @return AnimeTitle[] Returns an array of AnimeTitle objects
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
    public function findOneBySomeField($value): ?AnimeTitle
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
