<?php

namespace App\Repository;

use App\Entity\Buffs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Buffs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Buffs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Buffs[]    findAll()
 * @method Buffs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BuffsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Buffs::class);
    }

    // /**
    //  * @return Buffs[] Returns an array of Buffs objects
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
    public function findOneBySomeField($value): ?Buffs
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
