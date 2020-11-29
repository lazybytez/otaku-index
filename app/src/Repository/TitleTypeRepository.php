<?php

namespace App\Repository;

use App\Entity\TitleType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TitleType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TitleType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TitleType[]    findAll()
 * @method TitleType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitleTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TitleType::class);
    }

    // /**
    //  * @return TitleType[] Returns an array of TitleType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TitleType
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
