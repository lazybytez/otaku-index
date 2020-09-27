<?php

namespace App\Repository;

use App\Entity\AnimeTitles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnimeTitles|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimeTitles|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimeTitles[]    findAll()
 * @method AnimeTitles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimeTitlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnimeTitles::class);
    }

    /**
     * @return AnimeTitles[] Returns an array of all AnimeTitle ids
     */
    public function findAllAnimeIds()
    {
        $rawIds = $this->createQueryBuilder('a')
            ->select("a.aid")
            ->groupBy("a.aid")
            ->getQuery()
            ->getResult();

        $result = [];

        foreach ($rawIds as $value) {
            $result[] = $value["aid"];
        }

        return $result;
    }

    // /**
    //  * @return AnimeTitles[] Returns an array of AnimeTitles objects
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
    public function findOneBySomeField($value): ?AnimeTitles
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
