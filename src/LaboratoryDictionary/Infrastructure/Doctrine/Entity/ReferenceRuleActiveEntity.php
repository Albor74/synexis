<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Domain\Enum\Gender;
use App\LaboratoryDictionary\Infrastructure\Doctrine\Repository\ReferenceRuleActiveEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReferenceRuleActiveEntityRepository::class)]
#[ORM\Table(
    name: 'reference_rule_active',
    schema: 'laboratory_dictionary',
    options: [
        'check'   => 'priority >= 0',
        'comment' => 'Contains EXCLUDE USING gist constraint for reference ambiguity',
    ]
)]
class ReferenceRuleActiveEntity extends ReferenceRuleEntity
{
    #[ORM\ManyToOne(targetEntity: TestDefinitionActiveEntity::class, inversedBy: 'referenceRuleActive')]
    #[ORM\JoinColumn(name: 'test_definition_active_id', referencedColumnName: 'id', nullable: false)]
    private TestDefinitionActiveEntity $testDefinitionActives;

    public function __construct(
        TestDefinitionActiveEntity $testDefinitionActives,
        Gender $gender,
        array $normalityRule,
        int $priority,
    ) {
        parent::__construct(
            $gender,
            $normalityRule,
            $priority
        );
        $this->testDefinitionActives = $testDefinitionActives;
    }

    public function getTestDefinition(): TestDefinitionActiveEntity
    {
        return $this->testDefinitionActives;
    }

    public function setTestDefinition(TestDefinitionActiveEntity $testDefinitionActives): static
    {
        $this->testDefinitionActives = $testDefinitionActives;

        return $this;
    }
}
