<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Model;

use Symfony\Component\Uid\Uuid;

final class TestCategory
{
    public function __construct(
        private readonly Uuid $id,
        private readonly string $title,
        private readonly string $mnemonic,
    ) {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMnemonic(): string
    {
        return $this->mnemonic;
    }
}
