<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

use Symfony\Component\Uid\Uuid;

final class SpecimenDefinition
{
    use HasBuilder;

    public function __construct(
        private readonly Uuid $id,
        private readonly string $biomaterial,
        private readonly ContainerType $containerType,
        private readonly string $filler,
        private readonly string $temperatureCondition,
        private readonly string $stabilityPeriod,
        private readonly string $preparationRequirements,
    ) {
    }

    public function getContainerType(): ContainerType
    {
        return $this->containerType;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getBiomaterial(): string
    {
        return $this->biomaterial;
    }

    public function getFiller(): string
    {
        return $this->filler;
    }

    public function getTemperatureCondition(): string
    {
        return $this->temperatureCondition;
    }

    public function getStabilityPeriod(): string
    {
        return $this->stabilityPeriod;
    }

    public function getPreparationRequirements(): string
    {
        return $this->preparationRequirements;
    }
}
