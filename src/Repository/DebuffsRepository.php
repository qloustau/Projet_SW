<?php

namespace App\Repository;

use App\Entity\Debuffs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Debuffs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Debuffs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Debuffs[]    findAll()
 * @method Debuffs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DebuffsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Debuffs::class);
    }

    // /**
    //  * @return Debuffs[] Returns an array of Debuffs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Debuffs
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
