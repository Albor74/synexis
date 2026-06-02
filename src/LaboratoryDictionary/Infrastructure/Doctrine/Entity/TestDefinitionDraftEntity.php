<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Domain\Enum\ValueType;
use App\LaboratoryDictionary\Infrastructure\Doctrine\Repository\TestDefinitionDraftEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestDefinitionDraftEntityRepository::class)]
#[ORM\AttributeOverrides([
    new ORM\AttributeOverride(
        name: 'officialName',
        column: new ORM\Column(type: Types::TEXT, unique: true, nullable: false)
    ),
    new ORM\AttributeOverride(
        name: 'shortName',
        column: new ORM\Column(type: Types::TEXT, unique: true, nullable: false)
    ),
    new ORM\AttributeOverride(
        name: 'loincCode',
        column: new ORM\Column(type: Types::TEXT, unique: true, nullable: false)
    ),
    new ORM\AttributeOverride(
        name: 'methodology',
        column: new ORM\Column(type: Types::TEXT, nullable: false)
    ),
    new ORM\AttributeOverride(
        name: 'valueType',
        column: new ORM\Column(type: 'string', enumType: ValueType::class, nullable: false)
    ),
])]
#[ORM\Table(name: 'test_definitions_draft', schema: 'laboratory_dictionary', options: ['check' => 'version >= 0'])]

class TestDefinitionDraftEntity extends TestDefinitionLiveEntity
{
    /** @var Collection<int, ReferenceRuleDraftEntity> */
    #[ORM\OneToMany(targetEntity: ReferenceRuleDraftEntity::class, mappedBy: 'testDefinitionDrafts', orphanRemoval: true)]

    private Collection $referenceRuleDraftEntity;

    public function __construct(
        string $id,
        string $officialName,
        string $shortName,
        string $loincCode,
        string $methodology,
        TestCategoryEntity $categoryMnemonic,
        UnitEntity $unit,
        int $version,
        SpecimenDefinitionEntity $specimenDefinition,
        ValueType $valueType,
    ) {
        parent::__construct(
            $id,
            $officialName,
            $shortName,
            $loincCode,
            $methodology,
            $categoryMnemonic,
            $unit,
            $version,
            $specimenDefinition,
            $valueType
        );

        $this->referenceRuleDraftEntity = new ArrayCollection();
    }

    public array $referenceRule {
        get => $this->referenceRuleDraftEntity->toArray();
    }

    public function addReferenceRule(ReferenceRuleDraftEntity $rule): static
    {
        if (!$this->referenceRuleDraftEntity->contains($rule)) {
            $this->referenceRuleDraftEntity->add($rule);
            $rule->setTestDefinition($this);
        }

        return $this;
    }

    public function removeReferenceRule(ReferenceRuleDraftEntity $rule): static
    {
        $this->referenceRuleDraftEntity->removeElement($rule);

        return $this;
    }
}
