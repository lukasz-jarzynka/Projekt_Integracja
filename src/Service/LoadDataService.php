<?php

namespace App\Service;

use App\DataFixtures\AppFixtures;
use App\Entity\GetXmlData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;

class LoadDataService
{
    private $fixtures;
    private $manager;
    private $entityManager;

    public function __construct(AppFixtures $fixtures, ObjectManager $manager, EntityManagerInterface $entityManager)
    {
        $this->fixtures = $fixtures;
        $this->manager = $manager;
        $this->entityManager = $entityManager;

    }

    public function loadData()
    {
        $repository = $this->entityManager->getRepository(GetXmlData::class);
        $recordCount = $repository->createQueryBuilder('w')
            ->select('count(w.id)')
            ->getQuery()
            ->getSingleScalarResult();

        if($recordCount == 0) {
            $this->fixtures->load($this->manager);
        }

    }
}