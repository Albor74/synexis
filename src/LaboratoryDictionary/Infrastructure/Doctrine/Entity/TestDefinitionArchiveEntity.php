<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Infrastructure\Doctrine\Repository\TestDefinitionArchiveEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestDefinitionArchiveEntityRepository::class)]
#[ORM\Table(name: 'test_definitions_archive', schema: 'laboratory_dictionary')]
class TestDefinitionArchiveEntity extends TestDefinition
{
    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER)]
    public int $version;

    #[ORM\Column(type: 'jsonb', nullable: true)]
    public protected(set) ?array $referenceRulesSnapshot = null;

    #[ORM\Column(type: 'jsonb', nullable: true)]
    public protected(set) ?array $categorySnapshot = null;

    #[ORM\Column(type: 'jsonb', nullable: true)]
    public protected(set) ?array $unitSnapshot = null;

    #[ORM\Column(type: 'jsonb', nullable: true)]
    public protected(set) ?array $specimenDefinitionSnapshot = null;

    public function __construct(string $id, int $version)
    {
        parent::__construct($id);
        $this->version = $version;
    }
}
