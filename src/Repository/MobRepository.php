<?php

namespace App\Repository;

use App\Entity\Mob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mob|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mob|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mob[]    findAll()
 * @method Mob[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MobRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mob::class);
    }

    // /**
    //  * @return Mob[] Returns an array of Mob objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mob
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
