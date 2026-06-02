<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Domain\Enum\ValueType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class TestDefinitionLiveEntity extends TestDefinition
{
    #[ORM\Column(type: Types::INTEGER, nullable: false)]
    private int $version;

    #[ORM\ManyToOne(targetEntity: TestCategoryEntity::class)]
    #[ORM\JoinColumn(name: 'category_mnemonic', referencedColumnName: 'mnemonic', nullable: false)]
    private TestCategoryEntity $categoryMnemonic;

    #[ORM\ManyToOne(targetEntity: UnitEntity::class)]
    #[ORM\JoinColumn(name: 'unit_id', referencedColumnName: 'id', nullable: false)]
    private UnitEntity $unit;

    #[ORM\ManyToOne(targetEntity: SpecimenDefinitionEntity::class)]
    #[ORM\JoinColumn(name: 'specimen_definition_id', referencedColumnName: 'id', nullable: false)]
    private SpecimenDefinitionEntity $specimenDefinition;

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
        parent::__construct($id);

        $this->officialName = $officialName;
        $this->shortName = $shortName;
        $this->loincCode = $loincCode;
        $this->methodology = $methodology;
        $this->valueType = $valueType;

        $this->setVersion($version);

        $this->categoryMnemonic = $categoryMnemonic;
        $this->unit = $unit;
        $this->specimenDefinition = $specimenDefinition;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setVersion(int $version): static
    {
        if ($version < 0) {
            throw new \InvalidArgumentException('Version cannot be negative');
        }
        $this->version = $version;

        return $this;
    }

    public function getCategoryMnemonic(): TestCategoryEntity
    {
        return $this->categoryMnemonic;
    }

    public function getUnit(): UnitEntity
    {
        return $this->unit;
    }

    public function getSpecimenDefinition(): SpecimenDefinitionEntity
    {
        return $this->specimenDefinition;
    }
}
