<?php

namespace App\Repository;

use App\Entity\GetXmlData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GetXmlData>
 *
 * @method GetXmlData|null find($id, $lockMode = null, $lockVersion = null)
 * @method GetXmlData|null findOneBy(array $criteria, array $orderBy = null)
 * @method GetXmlData[]    findAll()
 * @method GetXmlData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GetXmlDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GetXmlData::class);
    }

    public function save(GetXmlData $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(GetXmlData $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function getForImportWhenNull(): ?GetXmlData
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.ts_last_download IS NULL')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//    /**
//     * @return GetXmlData[] Returns an array of GetXmlData objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GetXmlData
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
