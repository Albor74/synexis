<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Domain\Enum\Gender;
use App\LaboratoryDictionary\Domain\Enum\MenstrualPhase;
use App\LaboratoryDictionary\Domain\Enum\PregnancyTrimester;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use MartinGeorgiev\Doctrine\DBAL\Types\ValueObject\Range;

#[ORM\MappedSuperclass]
abstract class ReferenceRuleEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    public readonly int $id;

    #[ORM\Column(enumType: Gender::class)]
    protected private(set) Gender $gender;
    #[ORM\Column(type: 'int4range', nullable: true)]
    private ?Range $ageDaysRange = null;
    #[ORM\Column(nullable: true, enumType: PregnancyTrimester::class)]
    private ?PregnancyTrimester $pregnancyTrimester = null;
    #[ORM\Column(nullable: true, enumType: MenstrualPhase::class)]
    private ?MenstrualPhase $menstrualPhase = null;
    #[ORM\Column(type: 'jsonb')]
    private array $normalityRule;
    #[ORM\Column(type: 'jsonb', nullable: true)]
    private ?array $criticalityRule = null;
    #[ORM\Column(type: 'jsonb', nullable: true)]
    private ?array $interpretationRule = null;
    #[ORM\Column]
    private int $priority;

    public function __construct(
        Gender $gender,
        array $normalityRule,
        int $priority,
    ) {
        $this->gender = $gender;
        $this->normalityRule = $normalityRule;
        $this->priority = $priority;
    }

    public function getGender(): Gender
    {
        return $this->gender;
    }

    public function setGender(Gender $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAgeDaysRange(): ?Range
    {
        return $this->ageDaysRange;
    }

    public function setAgeDaysRange(?Range $ageDaysRange): static
    {
        $this->ageDaysRange = $ageDaysRange;

        return $this;
    }

    public function getPregnancyTrimester(): ?PregnancyTrimester
    {
        return $this->pregnancyTrimester;
    }

    public function setPregnancyTrimester(?PregnancyTrimester $pregnancyTrimester): static
    {
        $this->pregnancyTrimester = $pregnancyTrimester;

        return $this;
    }

    public function getMenstrualPhase(): ?MenstrualPhase
    {
        return $this->menstrualPhase;
    }

    public function setMenstrualPhase(?MenstrualPhase $menstrualPhase): static
    {
        $this->menstrualPhase = $menstrualPhase;

        return $this;
    }

    public function getNormalityRule(): array
    {
        return $this->normalityRule;
    }

    public function setNormalityRule(array $normalityRule): static
    {
        $this->normalityRule = $normalityRule;

        return $this;
    }

    public function getCriticalityRule(): ?array
    {
        return $this->criticalityRule;
    }

    public function setCriticalityRule(?array $criticalityRule): static
    {
        $this->criticalityRule = $criticalityRule;

        return $this;
    }

    public function getInterpretationRule(): ?array
    {
        return $this->interpretationRule;
    }

    public function setInterpretationRule(?array $interpretationRule): static
    {
        $this->interpretationRule = $interpretationRule;

        return $this;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): static
    {
        if ($priority < 0) {
            throw new \InvalidArgumentException('Priority cannot be negative');
        }
        $this->priority = $priority;

        return $this;
    }
}
