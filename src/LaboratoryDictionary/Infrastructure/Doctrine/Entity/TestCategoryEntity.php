<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Infrastructure\Doctrine\Repository\TestCategoryEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestCategoryEntityRepository::class)]
#[ORM\Table(name: 'test_categories', schema: 'laboratory_dictionary')]
class TestCategoryEntity
{
    #[ORM\Id]
    #[ORM\Column(type: Types::TEXT)]
    public readonly string $mnemonic;
    #[ORM\OneToMany(targetEntity: TestDefinitionDraftEntity::class, mappedBy: 'categoryMnemonic')]
    private Collection $testDefinitionDrafts;
    #[ORM\OneToMany(targetEntity: TestDefinitionActiveEntity::class, mappedBy: 'categoryMnemonic')]
    private Collection $testDefinitionActives;

    #[ORM\Column(type: Types::TEXT, unique: true)]
    private string $title;

    public function __construct(string $mnemonic, string $title)
    {
        $this->mnemonic = $mnemonic;
        $this->title = $title;
        $this->testDefinitionDrafts = new ArrayCollection();
        $this->testDefinitionActives = new ArrayCollection();
    }

    public function getTestDefinitionDrafts(): array
    {
        return $this->testDefinitionDrafts->toArray();
    }

    public function getTestDefinitionActives(): array
    {
        return $this->testDefinitionActives->toArray();
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
}
