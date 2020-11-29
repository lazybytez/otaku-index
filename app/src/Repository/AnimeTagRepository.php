<?php

namespace App\Repository;

use App\Entity\AnimeTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeTag[]    findAll()
 * @method AnimeTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeTag::class);
    }

    // /**
    //  * @return AnimeTag[] Returns an array of AnimeTag objects
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
    public function findOneBySomeField($value): ?AnimeTag
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
