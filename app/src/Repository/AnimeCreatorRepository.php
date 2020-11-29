<?php

namespace App\Repository;

use App\Entity\AnimeCreator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeCreator|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeCreator|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeCreator[]    findAll()
 * @method AnimeCreator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeCreatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeCreator::class);
    }

    // /**
    //  * @return AnimeCreator[] Returns an array of AnimeCreator objects
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
    public function findOneBySomeField($value): ?AnimeCreator
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
