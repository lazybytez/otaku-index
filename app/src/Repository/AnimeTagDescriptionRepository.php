<?php

namespace App\Repository;

use App\Entity\AnimeTagDescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeTagDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeTagDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeTagDescription[]    findAll()
 * @method AnimeTagDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeTagDescriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeTagDescription::class);
    }

    // /**
    //  * @return AnimeTagDescription[] Returns an array of AnimeTagDescription objects
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
    public function findOneBySomeField($value): ?AnimeTagDescription
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
