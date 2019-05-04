<?php

namespace App\Repository;

use App\Entity\OtherEffect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OtherEffect|null find($id, $lockMode = null, $lockVersion = null)
 * @method OtherEffect|null findOneBy(array $criteria, array $orderBy = null)
 * @method OtherEffect[]    findAll()
 * @method OtherEffect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OtherEffectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OtherEffect::class);
    }

    // /**
    //  * @return OtherEffect[] Returns an array of OtherEffect objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OtherEffect
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
