<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Enum;

enum UnitClassification: string
{
    use HasChoices;
    case CONCENTRATION = 'concentration';
    case MASS = 'mass';
    case VOLUME = 'volume';
    case ENZYME_ACTIVITY = 'enzyme_activity';

    public function label(): string
    {
        return match ($this) {
            self::CONCENTRATION   => 'Концентрация',
            self::MASS            => 'Масса',
            self::VOLUME          => 'Объём',
            self::ENZYME_ACTIVITY => 'Активность фермента',
        };
    }
}
