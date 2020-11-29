<?php

namespace App\Repository;

use App\Entity\AnimeCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeCharacter|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeCharacter|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeCharacter[]    findAll()
 * @method AnimeCharacter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeCharacter::class);
    }

    // /**
    //  * @return AnimeCharacter[] Returns an array of AnimeCharacter objects
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
    public function findOneBySomeField($value): ?AnimeCharacter
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
