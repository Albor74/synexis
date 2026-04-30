<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Builder;

use App\LaboratoryDictionaryModels\Domain\Enum\TestDefinitionStatus;
use App\LaboratoryDictionaryModels\Domain\Enum\ValueType;
use App\LaboratoryDictionaryModels\Domain\Model\ReferenceRule;
use App\LaboratoryDictionaryModels\Domain\Model\ResultOption;
use App\LaboratoryDictionaryModels\Domain\Model\SpecimenDefinition;
use App\LaboratoryDictionaryModels\Domain\Model\TestCategory;
use App\LaboratoryDictionaryModels\Domain\Model\TestDefinition;
use App\LaboratoryDictionaryModels\Domain\Model\Unit;
use Symfony\Component\Uid\Uuid;

class TestDefinitionBuilder
{
    private ?string $id = null;
    private ?string $officialName = null;
    private ?string $shortName = null;
    private ?string $loincCode = null;
    private ?TestCategory $category = null;
    private ?string $methodology = null;
    private ?Unit $unit = null;
    private int $version = 1;
    private ?TestDefinitionStatus $status = null;
    /** @var ReferenceRule[] */
    private array $rules = [];
    private ?SpecimenDefinition $specimen = null;
    private ?ValueType $valueType = null;
    /** @var ResultOption[] */
    private array $resultOptions = [];

    public function withId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withNames(string $official, string $short): self
    {
        $this->officialName = $official;
        $this->shortName = $short;

        return $this;
    }

    public function withLoincCode(?string $loincCode): self
    {
        $this->loincCode = $loincCode;

        return $this;
    }

    public function withCategory(TestCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function withMethodology(string $methodology): self
    {
        $this->methodology = $methodology;

        return $this;
    }

    public function withUnit(Unit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function withVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function withStatus(TestDefinitionStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    /** @param ReferenceRule[] $rules */
    public function withRules(array $rules): self
    {
        $this->rules = $rules;

        return $this;
    }

    public function withSpecimen(SpecimenDefinition $specimen): self
    {
        $this->specimen = $specimen;

        return $this;
    }

    public function withValueType(ValueType $valueType): self
    {
        $this->valueType = $valueType;

        return $this;
    }

    /** @param ResultOption[] $options */
    public function withResultOptions(array $options): self
    {
        $this->resultOptions = $options;

        return $this;
    }

    public function fromEntity(TestDefinition $testDefinition): self
    {
        $this->id = $testDefinition->getId();
        $this->officialName = $testDefinition->getOfficialName();
        $this->shortName = $testDefinition->getShortName();
        $this->loincCode = $testDefinition->getLoincCode();
        $this->category = $testDefinition->getCategory();
        $this->methodology = $testDefinition->getMethodology();
        $this->unit = $testDefinition->getUnit();
        $this->version = $testDefinition->getVersion();
        $this->status = $testDefinition->getStatus();
        $this->rules = $testDefinition->getRules();
        $this->specimen = $testDefinition->getSpecimen();
        $this->valueType = $testDefinition->getValueType();
        $this->resultOptions = $testDefinition->getResultOptions();

        return $this;
    }

    public function build(): TestDefinition
    {
        return new TestDefinition(
            $this->id ?? Uuid::v7()->toRfc4122(),
            $this->officialName ?? throw new \InvalidArgumentException('Official name is required'),
            $this->shortName ?? throw new \InvalidArgumentException('Short name is required'),
            $this->loincCode ?? '',
            $this->category ?? throw new \InvalidArgumentException('Category is required'),
            $this->methodology ?? throw new \InvalidArgumentException('Methodology is required'),
            $this->unit ?? throw new \InvalidArgumentException('Unit is required'),
            $this->version,
            $this->status ?? throw new \InvalidArgumentException('Status is required'),
            $this->rules,
            $this->specimen ?? throw new \InvalidArgumentException('Specimen is required'),
            $this->valueType ?? throw new \InvalidArgumentException('Value type is required'),
            $this->resultOptions
        );
    }
}
