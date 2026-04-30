<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Enum;

enum TestDefinitionStatus: string
{
    case ACTIVE = 'active';      // Доступен для заказа
    case DEPRECATED = 'deprecated'; // Снят с использования
    case DRAFT = 'draft';        // Стадия создания

    /**
     * Человеко-читаемое название на русском.
     */
    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Доступен для заказа',
            self::DEPRECATED => 'Снят с использования',
            self::DRAFT => 'Стадия создания',
        };
    }
}
