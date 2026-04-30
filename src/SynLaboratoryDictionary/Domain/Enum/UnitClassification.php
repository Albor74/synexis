<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Enum;

enum UnitClassification: string
{
    use HasChoices;
    case CONCENTRATION = 'concentration';   // Концентрация
    case MASS = 'mass';                     // Масса
    case VOLUME = 'volume';                 // Объём
    case ENZYME_ACTIVITY = 'enzyme_activity'; // Активность фермента

    public function label(): string
    {
        return match ($this) {
            self::CONCENTRATION => 'Концентрация',
            self::MASS => 'Масса',
            self::VOLUME => 'Объём',
            self::ENZYME_ACTIVITY => 'Активность фермента',
        };
    }
}
