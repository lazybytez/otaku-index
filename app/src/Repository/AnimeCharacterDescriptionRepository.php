<?php

namespace App\Repository;

use App\Entity\AnimeCharacterDescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeCharacterDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeCharacterDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeCharacterDescription[]    findAll()
 * @method AnimeCharacterDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeCharacterDescriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeCharacterDescription::class);
    }

    // /**
    //  * @return AnimeCharacterDescription[] Returns an array of AnimeCharacterDescription objects
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
    public function findOneBySomeField($value): ?AnimeCharacterDescription
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
