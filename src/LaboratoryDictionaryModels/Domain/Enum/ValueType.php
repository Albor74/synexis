<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Enum;

enum ValueType: string
{
    case QUANTITATIVE = 'quantitative'; // Количественное (числовое значение, требующее сравнения с диапазоном "от и до")
    case QUALITATIVE = 'qualitative';   // Качественное (текстовое значение из закрытого справочника)

    /**
     * Человеко-читаемое название на русском.
     */
    public function label(): string
    {
        return match ($this) {
            self::QUANTITATIVE => 'Количественное (числовое значение, требующее сравнения с диапазоном "от и до")',
            self::QUALITATIVE => 'Качественное (текстовое значение из закрытого справочника, например: «Положительно», «Отрицательно»)',
        };
    }
}
