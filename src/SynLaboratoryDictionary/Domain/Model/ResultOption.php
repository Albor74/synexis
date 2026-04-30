<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

final class ResultOption
{
    use HasBuilder;

    public function __construct(
        private readonly string $code,
        private readonly string $title,
        private readonly string $description,
        private readonly bool $isAbnormal,
    ) {
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isAbnormal(): bool
    {
        return $this->isAbnormal;
    }
}
