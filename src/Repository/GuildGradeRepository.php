<?php

namespace App\Repository;

use App\Entity\GuildGrade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GuildGrade|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuildGrade|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuildGrade[]    findAll()
 * @method GuildGrade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuildGradeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuildGrade::class);
    }

    // /**
    //  * @return GuildGrade[] Returns an array of GuildGrade objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GuildGrade
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
