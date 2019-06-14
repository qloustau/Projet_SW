<?php

namespace App\Repository;

use App\Entity\Mob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use phpDocumentor\Reflection\Types\Integer;
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

    public function getName(): array {

        $query = $this->getEntityManager()->createQuery("
            SELECT DISTINCT m.Name FROM App\Entity\Mob m 
         ");

        return array_flip(array_column($query->getScalarResult(), "Name"));
    }

    public function getFamily(): array {

        $query = $this->getEntityManager()->createQuery("
            SELECT DISTINCT m.Family FROM App\Entity\Mob m 
         ");

        return array_flip(array_column($query->getScalarResult(), "Family"));
    }

    public function getClass(): array {

        $query = $this->getEntityManager()->createQuery("
            SELECT DISTINCT m.Class FROM App\Entity\Mob m 
         ");

        return array_flip(array_column($query->getScalarResult(), "Class"));
    }

    public function getGradeNat(): array {

        $query = $this->getEntityManager()->createQuery("
            SELECT DISTINCT m.GradeNat FROM App\Entity\Mob m 
         ");

        return array_flip(array_column($query->getScalarResult(), "GradeNat"));
    }

    public function getAttribute(): array {

        $query = $this->getEntityManager()->createQuery("
            SELECT DISTINCT a.Name 
            FROM App\Entity\Attribute a 
         ");

        return array_flip(array_column($query->getScalarResult(), "Name"));
    }

    public function  getMobsByAttribute(string $name, string $family, string $class, int $gradenat, string $attribute): array {
        /** @var  $query Query*/

        if($gradenat === 0){
            $query = $this->getEntityManager()->createQuery("
                SELECT m
                FROM App\Entity\Mob m
                JOIN m.Attribute a
                WHERE m.Name LIKE :name AND m.Family LIKE :family AND m.Class LIKE :class AND a.Name LIKE :attribute
                GROUP BY m.id
                ORDER BY m.GradeNat, m.updated_at
            ");
            $query->setParameter('name', '%'.$name.'%');
            $query->setParameter('family', '%'.$family.'%');
            $query->setParameter('class', '%'.$class.'%');
            $query->setParameter('attribute', '%'.$attribute.'%');
        }
        else{
            $query = $this->getEntityManager()->createQuery("
                SELECT m
                FROM App\Entity\Mob m
                JOIN m.Attribute a
                WHERE m.Name LIKE :name AND m.Family LIKE :family AND m.Class LIKE :class AND a.Name LIKE :attribute AND m.GradeNat = :gradenat
                GROUP BY m.id
                ORDER BY m.GradeNat, m.updated_at
            ");
            $query->setParameter('name', '%'.$name.'%');
            $query->setParameter('family', '%'.$family.'%');
            $query->setParameter('class', '%'.$class.'%');
            $query->setParameter('attribute', '%'.$attribute.'%');
            $query->setParameter('gradenat', $gradenat);
        }

        return $query->getResult();
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
