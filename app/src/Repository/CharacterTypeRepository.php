<?php

namespace App\Repository;

use App\Entity\CharacterType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CharacterType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterType[]    findAll()
 * @method CharacterType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterType::class);
    }

    // /**
    //  * @return CharacterType[] Returns an array of CharacterType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CharacterType
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
