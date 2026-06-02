<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Builder;

use App\LaboratoryDictionary\Domain\Enum\TestDefinitionStatus;
use App\LaboratoryDictionary\Domain\Enum\ValueType;
use App\LaboratoryDictionary\Domain\Model\ReferenceRule;
use App\LaboratoryDictionary\Domain\Model\ResultOption;
use App\LaboratoryDictionary\Domain\Model\SpecimenDefinition;
use App\LaboratoryDictionary\Domain\Model\TestCategory;
use App\LaboratoryDictionary\Domain\Model\TestDefinition;
use App\LaboratoryDictionary\Domain\Model\Unit;

class TestDefinitionBuilder
{
    private string $id;
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

    public function withOfficialName(?string $officialName): self
    {
        $this->officialName = $officialName;

        return $this;
    }

    public function withShortName(?string $shortName): self
    {
        $this->shortName = $shortName;

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

    public function withMethodology(?string $methodology): self
    {
        $this->methodology = $methodology;

        return $this;
    }

    public function withUnit(?Unit $unit): self
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

    public static function from(TestDefinition $testDefinition): self
    {
        return new self()
            ->withId($testDefinition->getId())
            ->withOfficialName($testDefinition->getOfficialName())
            ->withShortName($testDefinition->getShortName())
            ->withLoincCode($testDefinition->getLoincCode())
            ->withCategory($testDefinition->getCategory() ?? throw new \InvalidArgumentException('Category is required'))
            ->withMethodology($testDefinition->getMethodology())
            ->withUnit($testDefinition->getUnit())
            ->withVersion($testDefinition->getVersion())
            ->withStatus($testDefinition->getStatus())
            ->withRules($testDefinition->getRules())
            ->withSpecimen($testDefinition->getSpecimen())
            ->withValueType($testDefinition->getValueType())
            ->withResultOptions($testDefinition->getResultOptions() ?? []);
    }

    public function build(): TestDefinition
    {
        return new TestDefinition(
            $this->id ?? throw new \InvalidArgumentException('Id is required'),
            $this->officialName ?? throw new \InvalidArgumentException('Official name is required'),
            $this->shortName ?? throw new \InvalidArgumentException('Short name is required'),
            $this->loincCode,
            $this->category ?? throw new \InvalidArgumentException('Category is required'),
            $this->methodology,
            $this->unit,
            $this->version,
            $this->status ?? throw new \InvalidArgumentException('Status is required'),
            $this->rules,
            $this->specimen ?? throw new \InvalidArgumentException('Specimen is required'),
            $this->valueType ?? throw new \InvalidArgumentException('Value type is required'),
            $this->resultOptions
        );
    }
}
