<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

use Symfony\Component\Uid\Uuid;

final class TestProfile
{
    use HasBuilder;

    /**
     * @param TestDefinition[] $tests
     */
    public function __construct(
        private readonly Uuid $id,
        private readonly string $code,
        private readonly string $title,
        private readonly array $tests,
    ) {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getTests(): array
    {
        return $this->tests;
    }
}
