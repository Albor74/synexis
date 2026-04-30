<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Builder;

use App\LaboratoryDictionaryModels\Domain\Model\ContainerType;
use App\LaboratoryDictionaryModels\Domain\Model\SpecimenDefinition;
use Symfony\Component\Uid\Uuid;

class SpecimenDefinitionBuilder
{
    private ?Uuid $id = null;
    private ?string $biomaterial = null;
    private ?ContainerType $containerType = null;
    private ?string $filler = null;
    private ?string $temperatureCondition = null;
    private ?string $stabilityPeriod = null;
    private ?string $preparationRequirements = null;

    public function withId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withBiomaterial(string $biomaterial): self
    {
        $this->biomaterial = $biomaterial;

        return $this;
    }

    public function withContainerType(ContainerType $type): self
    {
        $this->containerType = $type;

        return $this;
    }

    public function withFiller(?string $filler): self
    {
        $this->filler = $filler;

        return $this;
    }

    public function withTemperature(string $temp): self
    {
        $this->temperatureCondition = $temp;

        return $this;
    }

    public function withStability(string $isoPeriod): self
    {
        $this->stabilityPeriod = $isoPeriod;

        return $this;
    }

    public function withPreparation(?string $reqs): self
    {
        $this->preparationRequirements = $reqs;

        return $this;
    }

    public function fromSpecimen(SpecimenDefinition $specimen): self
    {
        $this->id = $specimen->getId();
        $this->biomaterial = $specimen->getBiomaterial();
        $this->containerType = $specimen->getContainerType();
        $this->filler = $specimen->getFiller() ?: null;
        $this->temperatureCondition = $specimen->getTemperatureCondition();
        $this->stabilityPeriod = $specimen->getStabilityPeriod();
        $this->preparationRequirements = $specimen->getPreparationRequirements() ?: null;

        return $this;
    }

    public function build(): SpecimenDefinition
    {
        return new SpecimenDefinition(
            $this->id ?? Uuid::v7(),
            $this->biomaterial ?? throw new \InvalidArgumentException('Biomaterial is required'),
            $this->containerType ?? throw new \InvalidArgumentException('Container type is required'),
            $this->filler,
            $this->temperatureCondition ?? throw new \InvalidArgumentException('Temperature condition is required'),
            $this->stabilityPeriod ?? throw new \InvalidArgumentException('Stability period is required'),
            $this->preparationRequirements
        );
    }
}
