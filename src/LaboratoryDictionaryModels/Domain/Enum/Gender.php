<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Enum;

enum Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    case ANY = 'any';

    /**
     * Человеко-читаемое название на русском.
     */
    public function label(): string
    {
        return match ($this) {
            self::MALE => 'Мужской',
            self::FEMALE => 'Женский',
            self::ANY => 'Любой',
        };
    }
}
