<?php

namespace App\Repository;

use App\Entity\AnimeInfoDescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeInfoDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeInfoDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeInfoDescription[]    findAll()
 * @method AnimeInfoDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeInfoDescriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeInfoDescription::class);
    }

    // /**
    //  * @return AnimeInfoDescription[] Returns an array of AnimeInfoDescription objects
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
    public function findOneBySomeField($value): ?AnimeInfoDescription
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
