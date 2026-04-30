<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Enum;

enum Gender: string
{
    use HasChoices;

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
