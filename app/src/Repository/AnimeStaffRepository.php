<?php

namespace App\Repository;

use App\Entity\AnimeStaff;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeStaff|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeStaff|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeStaff[]    findAll()
 * @method AnimeStaff[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeStaffRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeStaff::class);
    }

    // /**
    //  * @return AnimeStaff[] Returns an array of AnimeStaff objects
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
    public function findOneBySomeField($value): ?AnimeStaff
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
