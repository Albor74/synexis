<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Builder;

use App\LaboratoryDictionaryModels\Domain\Model\TestCategory;
use Symfony\Component\Uid\Uuid;

class TestCategoryBuilder
{
    private ?Uuid $id = null;
    private ?string $title = null;
    private ?string $mnemonic = null;

    public function withId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function withMnemonic(string $mnemonic): self
    {
        $this->mnemonic = $mnemonic;

        return $this;
    }

    public function build(): TestCategory
    {
        $id = $this->id ?? Uuid::v7();

        if (null === $this->title || '' === trim($this->title)) {
            throw new \InvalidArgumentException('Category title is required');
        }
        if (null === $this->mnemonic || '' === trim($this->mnemonic)) {
            throw new \InvalidArgumentException('Category mnemonic is required');
        }

        return new TestCategory(
            $id,
            $this->title,
            $this->mnemonic
        );
    }
}
