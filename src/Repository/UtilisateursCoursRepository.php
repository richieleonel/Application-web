<?php

namespace App\Repository;

use App\Entity\UtilisateursCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UtilisateursCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method UtilisateursCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method UtilisateursCours[]    findAll()
 * @method UtilisateursCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateursCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UtilisateursCours::class);
    }

    // /**
    //  * @return UtilisateursCours[] Returns an array of UtilisateursCours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UtilisateursCours
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
