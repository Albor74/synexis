<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Model;

use App\LaboratoryDictionaryModels\Domain\Enum\AgeUnit;

final class AgeRange
{
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
