<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Infrastructure\Doctrine\Repository\SpecimenDefinitionEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: SpecimenDefinitionEntityRepository::class)]
#[ORM\Table(name: 'specimen_definitions', schema: 'laboratory_dictionary')]
#[UniqueConstraint(
    name: 'uq_specimen_definition_biomaterial_container_filler',
    columns: ['biomaterial', 'container_id', 'filler']
)]
class SpecimenDefinitionEntity
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    public readonly Uuid $id;

    #[ORM\Column(type: Types::TEXT)]
    private string $biomaterial;

    #[ManyToOne(targetEntity: ContainerEntity::class, inversedBy: 'specimenDefinitions')]
    #[ORM\JoinColumn(name: 'container_id', referencedColumnName: 'id', nullable: false)]
    private ContainerEntity $container;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $filler = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $temperatureCondition = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $stabilityPeriod = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $preparationRequirements = null;

    public function __construct(string $biomaterial, ContainerEntity $container)
    {
        $this->id = Uuid::v7();
        $this->biomaterial = $biomaterial;

        $this->container = $container;
    }

    public function getBiomaterial(): string
    {
        return $this->biomaterial;
    }

    public function setBiomaterial(string $biomaterial): static
    {
        $this->biomaterial = $biomaterial;

        return $this;
    }

    public function getContainer(): ContainerEntity
    {
        return $this->container;
    }

    public function setContainer(ContainerEntity $container): static
    {
        $this->container = $container;

        return $this;
    }

    public function getFiller(): ?string
    {
        return $this->filler;
    }

    public function setFiller(?string $filler): static
    {
        $this->filler = $filler;

        return $this;
    }

    public function getTemperatureCondition(): ?string
    {
        return $this->temperatureCondition;
    }

    public function setTemperatureCondition(?string $temperatureCondition): static
    {
        $this->temperatureCondition = $temperatureCondition;

        return $this;
    }

    public function getStabilityPeriod(): ?string
    {
        return $this->stabilityPeriod;
    }

    public function setStabilityPeriod(?string $stabilityPeriod): static
    {
        $this->stabilityPeriod = $stabilityPeriod;

        return $this;
    }

    public function getPreparationRequirements(): ?string
    {
        return $this->preparationRequirements;
    }

    public function setPreparationRequirements(?string $preparationRequirements): static
    {
        $this->preparationRequirements = $preparationRequirements;

        return $this;
    }
}
