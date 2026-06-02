<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Domain\Enum\ValueType;
use App\LaboratoryDictionary\Infrastructure\Doctrine\Repository\TestDefinitionActiveEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestDefinitionActiveEntityRepository::class)]
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
#[ORM\Table(name: 'test_definitions_active', schema: 'laboratory_dictionary', options: ['check' => 'version >= 0'])]
class TestDefinitionActiveEntity extends TestDefinitionLiveEntity
{
    /** @var Collection<int, ReferenceRuleActiveEntity> */
    #[ORM\OneToMany(targetEntity: ReferenceRuleActiveEntity::class, mappedBy: 'testDefinitionActives', orphanRemoval: true)]
    private Collection $referenceRuleActive;

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

        $this->referenceRuleActive = new ArrayCollection();
    }

    public array $referenceRules {
        get => $this->referenceRuleActive->toArray();
    }

    public function addReferenceRule(ReferenceRuleActiveEntity $rule): static
    {
        if (!$this->referenceRuleActive->contains($rule)) {
            $this->referenceRuleActive->add($rule);
            $rule->setTestDefinition($this);
        }

        return $this;
    }

    public function removeReferenceRule(ReferenceRuleActiveEntity $rule): static
    {
        $this->referenceRuleActive->removeElement($rule);

        return $this;
    }
}
