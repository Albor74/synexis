<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Builder;

use App\SynLaboratoryDictionary\Domain\Enum\AgeUnit;
use App\SynLaboratoryDictionary\Domain\Model\AgeRange;

class AgeRangeBuilder
{
    private ?int $min = null;
    private ?int $max = null;
    private AgeUnit $unit = AgeUnit::DAYS;

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

    public function fillFromModel(AgeRange $ageRange): self
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
