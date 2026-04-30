<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

use App\SynLaboratoryDictionary\Domain\Enum\TestDefinitionStatus;
use App\SynLaboratoryDictionary\Domain\Enum\ValueType;

final class TestDefinition
{
    use HasBuilder;

    /**
     * @param ReferenceRule[] $rules
     * @param ResultOption[]  $resultOptions
     */
    public function __construct(
        private readonly string $id,
        private readonly string $officialName,
        private readonly string $shortName,
        private readonly string $loincCode,
        private readonly TestCategory $category,
        private readonly string $methodology,
        private readonly Unit $unit,
        private readonly int $version,
        private readonly TestDefinitionStatus $status,
        private readonly array $rules,
        private readonly SpecimenDefinition $specimen,
        private readonly ValueType $valueType,
        private readonly array $resultOptions,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getOfficialName(): string
    {
        return $this->officialName;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function getLoincCode(): string
    {
        return $this->loincCode;
    }

    public function getCategory(): TestCategory
    {
        return $this->category;
    }

    public function getMethodology(): string
    {
        return $this->methodology;
    }

    public function getUnit(): Unit
    {
        return $this->unit;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function getStatus(): TestDefinitionStatus
    {
        return $this->status;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function getSpecimen(): SpecimenDefinition
    {
        return $this->specimen;
    }

    public function getValueType(): ValueType
    {
        return $this->valueType;
    }

    public function getResultOptions(): array
    {
        return $this->resultOptions;
    }
}
