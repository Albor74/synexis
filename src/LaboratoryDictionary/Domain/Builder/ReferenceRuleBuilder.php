<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Builder;

use App\LaboratoryDictionary\Domain\Model\ReferencePolicy;
use App\LaboratoryDictionary\Domain\Model\ReferenceRule;
use Symfony\Component\Uid\Uuid;

class ReferenceRuleBuilder
{
    private Uuid $id;
    private ?string $testId = null;
    private ?ReferencePolicy $policy = null;
    private ?array $normalityRule = null;
    private ?array $criticalityRule = null;
    private ?array $interpretationRule = null;
    private int $priority = 0;

    public function withId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function withTestId(string $testId): self
    {
        $this->testId = $testId;

        return $this;
    }

    public function withPolicy(ReferencePolicy $policy): self
    {
        $this->policy = $policy;

        return $this;
    }

    public function withNormalityRule(?array $normalityRule): self
    {
        $this->normalityRule = $normalityRule;

        return $this;
    }

    public function withCriticalityRule(?array $rule): self
    {
        $this->criticalityRule = $rule;

        return $this;
    }

    public function withInterpretationRule(?array $interpretationRule): self
    {
        $this->interpretationRule = $interpretationRule;

        return $this;
    }

    public function withPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public static function from(ReferenceRule $rule): self
    {
        return new self()
        ->withId($rule->getId())
        ->withTestId($rule->getTestId())
        ->withPolicy($rule->getPolicy())
        ->withNormalityRule($rule->getNormalityRule())
        ->withCriticalityRule($rule->getCriticalityRule())
        ->withInterpretationRule($rule->getInterpretationRule())
        ->withPriority($rule->getPriority());
    }

    public function build(): ReferenceRule
    {
        return new ReferenceRule(
            $this->id ?? throw new \InvalidArgumentException('Id is required for ReferenceRule'),
            $this->testId ?? throw new \InvalidArgumentException('Test ID is required for ReferenceRule'),
            $this->policy ?? throw new \InvalidArgumentException('Policy is required for ReferenceRule'),
            $this->normalityRule,
            $this->criticalityRule,
            $this->interpretationRule,
            $this->priority
        );
    }
}
