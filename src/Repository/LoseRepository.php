<?php

namespace App\Repository;

use App\Entity\Lose;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lose|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lose|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lose[]    findAll()
 * @method Lose[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lose::class);
    }

    // /**
    //  * @return Lose[] Returns an array of Lose objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lose
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
