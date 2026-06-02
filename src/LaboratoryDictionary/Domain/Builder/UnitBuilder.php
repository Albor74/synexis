<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Builder;

use App\LaboratoryDictionary\Domain\Enum\UnitClassification;
use App\LaboratoryDictionary\Domain\Model\Unit;
use Symfony\Component\Uid\Uuid;

class UnitBuilder
{
    private Uuid $id;
    private ?string $code = null;
    private ?string $title = null;
    private ?string $description = null;
    private ?UnitClassification $classification = null;

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

    public static function from(Unit $unit): self
    {
        return new self()
            ->withId($unit->getId())
            ->withCode($unit->getCode())
            ->withTitle($unit->getTitle())
            ->withDescription($unit->getDescription())
            ->withClassification($unit->getClassification());
    }

    public function build(): Unit
    {
        if (null === $this->code || '' === trim($this->code)) {
            throw new \InvalidArgumentException('Unit code is required');
        }

        if (!isset($this->id)) {
            throw new \InvalidArgumentException('Unit id is required');
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
            $this->description,
            $this->classification,
        );
    }
}
