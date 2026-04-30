<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Builder;

use App\LaboratoryDictionaryModels\Domain\Model\ReferencePolicy;
use App\LaboratoryDictionaryModels\Domain\Model\ReferenceRule;
use Symfony\Component\Uid\Uuid;

class ReferenceRuleBuilder
{
    private ?Uuid $id = null;
    private ?string $testId = null;
    private ?ReferencePolicy $policy = null;
    private array $normalityRule = [];
    private array $criticalityRule = [];
    private array $interpretationRule = [];
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

    public function withNormality(array $rule): self
    {
        $this->normalityRule = $rule;

        return $this;
    }

    public function withCriticality(array $rule): self
    {
        $this->criticalityRule = $rule;

        return $this;
    }

    public function withInterpretation(array $rule): self
    {
        $this->interpretationRule = $rule;

        return $this;
    }

    public function withPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function fromEntity(ReferenceRule $rule): self
    {
        $this->id = $rule->getId();
        $this->testId = $rule->getTestId();
        $this->policy = $rule->getPolicy();
        $this->normalityRule = $rule->getNormalityRule();
        $this->criticalityRule = $rule->getCriticalityRule();
        $this->interpretationRule = $rule->getInterpretationRule();
        $this->priority = $rule->getPriority();

        return $this;
    }

    public function build(): ReferenceRule
    {
        return new ReferenceRule(
            $this->id ?? Uuid::v7(),
            $this->testId ?? throw new \InvalidArgumentException('Test ID is required for ReferenceRule'),
            $this->policy ?? throw new \InvalidArgumentException('Policy is required for ReferenceRule'),
            $this->normalityRule,
            $this->criticalityRule,
            $this->interpretationRule,
            $this->priority
        );
    }
}
