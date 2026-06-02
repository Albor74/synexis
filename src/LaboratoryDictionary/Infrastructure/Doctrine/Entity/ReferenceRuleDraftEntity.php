<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Domain\Enum\Gender;
use App\LaboratoryDictionary\Infrastructure\Doctrine\Repository\ReferenceRuleDraftEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReferenceRuleDraftEntityRepository::class)]
#[ORM\Table(
    name: 'reference_rule_draft',
    schema: 'laboratory_dictionary',
    options: [
        'check'   => 'priority >= 0',
        'comment' => 'Contains EXCLUDE USING gist constraint for reference ambiguity',
    ]
)]
class ReferenceRuleDraftEntity extends ReferenceRuleEntity
{
    #[ORM\ManyToOne(targetEntity: TestDefinitionDraftEntity::class, inversedBy: 'referenceRuleDraftEntity')]
    #[ORM\JoinColumn(name: 'test_definition_id', referencedColumnName: 'id', nullable: false)]
    private TestDefinitionDraftEntity $testDefinitionDrafts;

    public function __construct(
        TestDefinitionDraftEntity $testDefinitionDrafts,
        Gender $gender,
        array $normalityRule,
        int $priority,
    ) {
        parent::__construct(
            $gender,
            $normalityRule,
            $priority
        );
        $this->testDefinitionDrafts = $testDefinitionDrafts;
    }

    public function getTestDefinition(): TestDefinitionDraftEntity
    {
        return $this->testDefinitionDrafts;
    }

    public function setTestDefinition(TestDefinitionDraftEntity $testDefinitionDrafts): static
    {
        $this->testDefinitionDrafts = $testDefinitionDrafts;

        return $this;
    }
}
