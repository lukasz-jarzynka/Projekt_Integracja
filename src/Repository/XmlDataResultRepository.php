<?php

namespace App\Repository;

use App\Entity\XmlDataResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<XmlDataResult>
 *
 * @method XmlDataResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method XmlDataResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method XmlDataResult[]    findAll()
 * @method XmlDataResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class XmlDataResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, XmlDataResult::class);
    }

    public function save(XmlDataResult $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(XmlDataResult $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return XmlDataResult[] Returns an array of XmlDataResult objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('x')
//            ->andWhere('x.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('x.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?XmlDataResult
//    {
//        return $this->createQueryBuilder('x')
//            ->andWhere('x.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
