<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Enum;

enum MenstrualPhase: string
{
    case FOLLICULAR = 'follicular';        // Фолликулярная фаза
    case OVULATORY = 'ovulatory';          // Овуляторная фаза
    case LUTEAL = 'luteal';                // Лютеиновая фаза
    case MENOPAUSE = 'menopause';          // Менопауза
    case POSTMENOPAUSE = 'postmenopause';  // Постменопауза

    /**
     * Человеко-читаемое название на русском.
     */
    public function label(): string
    {
        return match ($this) {
            self::FOLLICULAR => 'Фолликулярная фаза',
            self::OVULATORY => 'Овуляторная фаза',
            self::LUTEAL => 'Лютеиновая фаза',
            self::MENOPAUSE => 'Менопауза',
            self::POSTMENOPAUSE => 'Постменопауза',
        };
    }
}
