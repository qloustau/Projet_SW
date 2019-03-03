<?php

namespace App\Repository;

use App\Entity\GuildWar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GuildWar|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuildWar|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuildWar[]    findAll()
 * @method GuildWar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuildWarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GuildWar::class);
    }

    // /**
    //  * @return GuildWar[] Returns an array of GuildWar objects
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
    public function findOneBySomeField($value): ?GuildWar
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
