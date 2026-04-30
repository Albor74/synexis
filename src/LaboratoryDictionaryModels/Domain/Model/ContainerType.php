<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Model;

use Symfony\Component\Uid\Uuid;

final class ContainerType
{
    public function __construct(
        private readonly Uuid $id,
        private readonly string $colorTitle,
        private readonly string $colorHex,
        private readonly float $volume,
    ) {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getColorTitle(): string
    {
        return $this->colorTitle;
    }

    public function getColorHex(): string
    {
        return $this->colorHex;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }
}
