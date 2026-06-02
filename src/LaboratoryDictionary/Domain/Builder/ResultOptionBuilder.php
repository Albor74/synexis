<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Builder;

use App\LaboratoryDictionary\Domain\Model\ResultOption;

class ResultOptionBuilder
{
    private ?string $code = null;
    private ?string $title = null;
    private string $description = '';
    private ?bool $isAbnormal = null;

    public function withCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function withTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function withDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function withIsAbnormal(bool $isAbnormal): self
    {
        $this->isAbnormal = $isAbnormal;

        return $this;
    }

    public static function from(ResultOption $option): self
    {
        return new self()
        ->withCode($option->getCode())
        ->withTitle($option->getTitle())
        ->withDescription($option->getDescription())
        ->withIsAbnormal($option->isAbnormal());
    }

    public function build(): ResultOption
    {
        if (null === $this->code || '' === trim($this->code)) {
            throw new \InvalidArgumentException('ResultOption code is required');
        }

        if (null === $this->title || '' === trim($this->title)) {
            throw new \InvalidArgumentException('ResultOption title is required');
        }

        if (null === $this->isAbnormal) {
            throw new \InvalidArgumentException('isAbnormal is required');
        }

        return new ResultOption(
            $this->code,
            $this->title,
            $this->description,
            $this->isAbnormal,
        );
    }
}
