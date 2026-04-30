<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

use Symfony\Component\Uid\Uuid;

final class ReferenceRule
{
    use HasBuilder;

    public function __construct(
        private readonly Uuid $id,
        private readonly string $testId,
        private readonly ReferencePolicy $policy,
        private readonly array $normalityRule,
        private readonly array $criticalityRule,
        private readonly array $interpretationRule,
        private readonly int $priority,
    ) {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getTestId(): string
    {
        return $this->testId;
    }

    public function getPolicy(): ReferencePolicy
    {
        return $this->policy;
    }

    public function getNormalityRule(): array
    {
        return $this->normalityRule;
    }

    public function getCriticalityRule(): array
    {
        return $this->criticalityRule;
    }

    public function getInterpretationRule(): array
    {
        return $this->interpretationRule;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }
}
