<?php

namespace App\Repository;

use App\Entity\JeuxVideos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JeuxVideos>
 *
 * @method JeuxVideos|null find($id, $lockMode = null, $lockVersion = null)
 * @method JeuxVideos|null findOneBy(array $criteria, array $orderBy = null)
 * @method JeuxVideos[]    findAll()
 * @method JeuxVideos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeuxVideosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JeuxVideos::class);
    }

//    /**
//     * @return JeuxVideos[] Returns an array of JeuxVideos objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?JeuxVideos
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
