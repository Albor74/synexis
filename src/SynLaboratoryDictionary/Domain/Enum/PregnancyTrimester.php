<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Enum;

enum PregnancyTrimester: string
{
    use HasChoices;
    case NOT_PREGNANT = 'not_pregnant';        // Не беременна
    case FIRST_TRIMESTER = 'first_trimester';  // I триместр
    case SECOND_TRIMESTER = 'second_trimester'; // II триместр
    case THIRD_TRIMESTER = 'third_trimester';  // III триместр
    case POSTPARTUM = 'postpartum';            // Послеродовой период

    /**
     * Получить человеко-читаемое название на русском
     */
    public function label(): string
    {
        return match ($this) {
            self::NOT_PREGNANT => 'Не беременна',
            self::FIRST_TRIMESTER => 'I триместр',
            self::SECOND_TRIMESTER => 'II триместр',
            self::THIRD_TRIMESTER => 'III триместр',
            self::POSTPARTUM => 'Послеродовой период',
        };
    }
}
