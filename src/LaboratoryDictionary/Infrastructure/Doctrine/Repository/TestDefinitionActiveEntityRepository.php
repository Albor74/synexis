<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Repository;

use App\LaboratoryDictionary\Infrastructure\Doctrine\Entity\TestDefinitionActiveEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TestDefinitionActiveEntity>
 */
class TestDefinitionActiveEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestDefinitionActiveEntity::class);
    }
}
