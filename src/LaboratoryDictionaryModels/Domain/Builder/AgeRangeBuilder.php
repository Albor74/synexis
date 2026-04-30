<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Builder;

use App\LaboratoryDictionaryModels\Domain\Enum\AgeUnit;
use App\LaboratoryDictionaryModels\Domain\Model\AgeRange;

class AgeRangeBuilder
{
    private ?int $min = null;
    private ?int $max = null;
    private AgeUnit $unit = AgeUnit::YEARS; // По умолчанию чаще всего годы

    public function withMin(int $min): self
    {
        $this->min = $min;

        return $this;
    }

    public function withMax(int $max): self
    {
        $this->max = $max;

        return $this;
    }

    public function withUnit(AgeUnit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function fromEntity(AgeRange $ageRange): self
    {
        $this->min = $ageRange->getMin();
        $this->max = $ageRange->getMax();
        $this->unit = $ageRange->getUnit();

        return $this;
    }

    public function build(): AgeRange
    {
        if (null === $this->min || $this->min < 0) {
            throw new \InvalidArgumentException('Age range minimum must be a non-negative integer');
        }

        if (null === $this->max || $this->max < $this->min) {
            throw new \InvalidArgumentException('Age range maximum must be greater than or equal to minimum');
        }

        return new AgeRange(
            $this->min,
            $this->max,
            $this->unit
        );
    }
}
