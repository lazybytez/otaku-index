<?php

namespace App\Repository;

use App\Entity\MediaType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MediaType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaType[]    findAll()
 * @method MediaType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaType::class);
    }

    // /**
    //  * @return MediaType[] Returns an array of MediaType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MediaType
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
