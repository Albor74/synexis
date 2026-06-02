<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Builder;

use App\LaboratoryDictionary\Domain\Model\Container;
use App\LaboratoryDictionary\Domain\Model\SpecimenDefinition;
use Symfony\Component\Uid\Uuid;

class SpecimenDefinitionBuilder
{
    private Uuid $id;
    private string $biomaterial;
    private Container $containerType;
    private ?string $filler = null;
    private string $temperatureCondition;
    private string $stabilityPeriod;
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

    public function withContainer(Container $type): self
    {
        $this->containerType = $type;

        return $this;
    }

    public function withFiller(?string $filler): self
    {
        $this->filler = $filler;

        return $this;
    }

    public function withTemperatureCondition(string $temp): self
    {
        $this->temperatureCondition = $temp;

        return $this;
    }

    public function withStability(string $period): self
    {
        $this->stabilityPeriod = $period;

        return $this;
    }

    public function withPreparation(?string $preparation): self
    {
        $this->preparationRequirements = $preparation;

        return $this;
    }

    public static function from(SpecimenDefinition $specimen): self
    {
        return new self()
        ->withId($specimen->getId())
        ->withBiomaterial($specimen->getBiomaterial())
        ->withContainer($specimen->getContainer())
        ->withFiller($specimen->getFiller() ?: null)
        ->withTemperatureCondition($specimen->getTemperatureCondition())
        ->withStability($specimen->getStabilityPeriod())
        ->withPreparation($specimen->getPreparationRequirements() ?: null);
    }

    public function build(): SpecimenDefinition
    {
        return new SpecimenDefinition(
            $this->id ?? throw new \InvalidArgumentException('Id is required'),
            $this->biomaterial ?? throw new \InvalidArgumentException('Biomaterial is required'),
            $this->containerType ?? throw new \InvalidArgumentException('Container type is required'),
            $this->filler,
            $this->temperatureCondition ?? throw new \InvalidArgumentException('Temperature condition is required'),
            $this->stabilityPeriod ?? throw new \InvalidArgumentException('Stability period is required'),
            $this->preparationRequirements
        );
    }
}
