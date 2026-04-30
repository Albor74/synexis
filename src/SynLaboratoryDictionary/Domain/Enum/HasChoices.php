<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Enum;

trait HasChoices
{
    public static function getChoices(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(static fn (self $item) => $item->label(), self::cases())
        );
    }
}
