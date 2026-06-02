<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Builder;

use App\LaboratoryDictionary\Domain\Model\Container;
use Symfony\Component\Uid\Uuid;

class ContainerBuilder
{
    private Uuid $id;
    private ?string $colorTitle = null;
    private ?string $colorHex = null;
    private ?float $volume = null;

    public function withId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withColorTitle(string $title): self
    {
        $this->colorTitle = $title;

        return $this;
    }

    public function withColorHex(string $hex): self
    {
        $this->colorHex = $hex;

        return $this;
    }

    public function withVolume(float $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public static function from(Container $container): self
    {
        return new self()
            ->withId($container->getId())
            ->withColorTitle($container->getColorTitle())
            ->withColorHex($container->getColorHex())
            ->withVolume($container->getVolume());
    }

    public function build(): Container
    {
        if (!isset($this->id)) {
            throw new \InvalidArgumentException('ID is required and must be set before building');
        }

        return new Container(
            $this->id,
            $this->colorTitle ?? throw new \InvalidArgumentException('Color title is required'),
            $this->colorHex ?? throw new \InvalidArgumentException('Color hex code is required'),
            $this->volume ?? throw new \InvalidArgumentException('Volume is required'),
        );
    }
}
