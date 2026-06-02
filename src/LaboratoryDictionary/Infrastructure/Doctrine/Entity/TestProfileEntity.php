<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Infrastructure\Doctrine\Repository\TestProfileEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestProfileEntityRepository::class)]
#[ORM\Table(name: 'test_profiles', schema: 'laboratory_dictionary')]
class TestProfileEntity
{
    #[ORM\Id]
    #[ORM\Column(type: Types::TEXT)]
    public readonly string $code;

    #[ORM\Column(type: Types::TEXT, nullable: false, unique: true)]
    private string $title;
    #[ORM\ManyToMany(targetEntity: TestDefinitionActiveEntity::class)]
    #[ORM\JoinTable(
        name: 'test_profile_test_definitions',
        schema: 'laboratory_dictionary',
        joinColumns: [new ORM\JoinColumn(name: 'profile_code', referencedColumnName: 'code')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'test_definition_id', referencedColumnName: 'id')]
    )]
    private Collection $testDefinitions;

    public function __construct(string $code, string $title)
    {
        $this->code = $code;
        $this->title = $title;
        $this->testDefinitions = new ArrayCollection();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getTestDefinitions(): array
    {
        return $this->testDefinitions->toArray();
    }

    public function addTestDefinition(TestDefinitionActiveEntity $testDefinition): static
    {
        if (!$this->testDefinitions->contains($testDefinition)) {
            $this->testDefinitions->add($testDefinition);
        }

        return $this;
    }

    public function removeTestDefinition(TestDefinitionActiveEntity $testDefinition): static
    {
        $this->testDefinitions->removeElement($testDefinition);

        return $this;
    }
}
