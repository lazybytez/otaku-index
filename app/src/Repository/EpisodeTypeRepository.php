<?php

namespace App\Repository;

use App\Entity\EpisodeType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EpisodeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method EpisodeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method EpisodeType[]    findAll()
 * @method EpisodeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EpisodeTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EpisodeType::class);
    }

    // /**
    //  * @return EpisodeType[] Returns an array of EpisodeType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EpisodeType
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
