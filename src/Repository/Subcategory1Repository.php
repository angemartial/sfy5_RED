<?php

namespace App\Repository;

use App\Entity\Subcategory1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Subcategory1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subcategory1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subcategory1[]    findAll()
 * @method Subcategory1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Subcategory1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Subcategory1::class);
    }

    // /**
    //  * @return Subcategory1[] Returns an array of Subcategory1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Subcategory1
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
