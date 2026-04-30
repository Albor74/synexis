<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Enum;

enum ValueType: string
{
    use HasChoices;
    case QUANTITATIVE = 'quantitative'; // Количественное
    case QUALITATIVE = 'qualitative';   // Качественное

    public function label(): string
    {
        return match ($this) {
            self::QUANTITATIVE => 'Количественное' ,
            self::QUALITATIVE => 'Качественное' ,
        };
    }
}
