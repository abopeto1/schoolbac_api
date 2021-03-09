<?php

namespace App\Repository;

use App\Entity\FirstPeriod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FirstPeriod|null find($id, $lockMode = null, $lockVersion = null)
 * @method FirstPeriod|null findOneBy(array $criteria, array $orderBy = null)
 * @method FirstPeriod[]    findAll()
 * @method FirstPeriod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FirstPeriodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FirstPeriod::class);
    }

    // /**
    //  * @return FirstPeriod[] Returns an array of FirstPeriod objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FirstPeriod
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
