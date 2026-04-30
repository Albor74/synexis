<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Builder;

use App\LaboratoryDictionaryModels\Domain\Model\ContainerType;
use Symfony\Component\Uid\Uuid;

class ContainerTypeBuilder
{
    private ?Uuid $id = null;
    private ?string $colorTitle = null;
    private ?string $colorHex = null;
    private ?float $volume = null;

    public function withId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withColor(string $title, string $hex): self
    {
        $this->colorTitle = $title;
        $this->colorHex = $hex;

        return $this;
    }

    public function withVolume(float $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function fromContainerType(ContainerType $containerType): self
    {
        $this->id = $containerType->getId();
        $this->colorTitle = $containerType->getColorTitle();
        $this->colorHex = $containerType->getColorHex();
        $this->volume = $containerType->getVolume();

        return $this;
    }

    public function build(): ContainerType
    {
        return new ContainerType(
            $this->id ?? Uuid::v7(),
            $this->colorTitle ?? throw new \InvalidArgumentException('Color title is required'),
            $this->colorHex ?? throw new \InvalidArgumentException('Color hex code is required'),
            $this->volume ?? throw new \InvalidArgumentException('Volume is required'),
        );
    }
}
