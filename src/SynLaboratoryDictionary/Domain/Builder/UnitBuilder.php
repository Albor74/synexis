<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Builder;

use App\SynLaboratoryDictionary\Domain\Enum\UnitClassification;
use App\SynLaboratoryDictionary\Domain\Model\Unit;
use Symfony\Component\Uid\Uuid;

class UnitBuilder
{
    private Uuid $id;
    private ?string $code = null;
    private ?string $title = null;
    private ?string $description = null;
    private ?UnitClassification $classification = null;

    public function __construct()
    {
        $this->id = Uuid::v7();
    }

    public function withId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function withTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function withDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function withClassification(UnitClassification $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function fillFromModel(Unit $unit): self
    {
        $this->id = $unit->getId();
        $this->code = $unit->getCode();
        $this->title = $unit->getTitle();
        $this->description = $unit->getDescription();
        $this->classification = $unit->getClassification();

        return $this;
    }

    public function build(): Unit
    {
        if (null === $this->code || '' === trim($this->code)) {
            throw new \InvalidArgumentException('Unit code is required');
        }

        if (null === $this->title || '' === trim($this->title)) {
            throw new \InvalidArgumentException('Unit title is required');
        }

        if (null === $this->classification) {
            throw new \InvalidArgumentException('Unit classification is required');
        }

        return new Unit(
            $this->id,
            $this->code,
            $this->title,
            $this->description, // может быть null
            $this->classification,
        );
    }
}
