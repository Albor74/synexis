<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

use App\SynLaboratoryDictionary\Domain\Enum\AgeUnit;

final class AgeRange
{
    use HasBuilder;

    public function __construct(
        private readonly int $min,
        private readonly int $max,
        private readonly AgeUnit $unit,
    ) {
    }

    public function getMin(): int
    {
        return $this->min;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function getUnit(): AgeUnit
    {
        return $this->unit;
    }
}
