<?php

namespace App\Repository;

use App\Entity\TeamWorkSpace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TeamWorkSpace>
 *
 * @method TeamWorkSpace|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamWorkSpace|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamWorkSpace[]    findAll()
 * @method TeamWorkSpace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamWorkSpaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeamWorkSpace::class);
    }

    public function add(TeamWorkSpace $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TeamWorkSpace $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TeamWorkSpace[] Returns an array of TeamWorkSpace objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TeamWorkSpace
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
