<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Enum;

enum UnitClassification: string
{
    case CONCENTRATION = 'concentration';   // Концентрация
    case MASS = 'mass';                     // Масса
    case VOLUME = 'volume';                 // Объём
    case ENZYME_ACTIVITY = 'enzyme_activity'; // Активность фермента

    /**
     * Человеко-читаемое название на русском.
     */
    public function label(): string
    {
        return match ($this) {
            self::CONCENTRATION => 'Концентрация',
            self::MASS => 'Масса',
            self::VOLUME => 'Объём',
            self::ENZYME_ACTIVITY => 'Активность фермента',
        };
    }

    /* Если планируете использовать эти лейблы, например, в выпадающих списках на фронте, можно добавить статический метод для получения всех вариантов: */
    public static function getChoices(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(static fn (self $item) => $item->label(), self::cases())
        );
    }
}
