<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Enum;

enum AgeUnit: string
{
    use HasChoices;

    case DAYS = 'days';    // Дни
    case MONTHS = 'months'; // Месяцы
    case YEARS = 'years';   // Года

    /**
     * Человеко-читаемое название на русском.
     */
    public function label(): string
    {
        return match ($this) {
            self::DAYS   => 'Дни',
            self::MONTHS => 'Месяцы',
            self::YEARS  => 'Года',
        };
    }
}
