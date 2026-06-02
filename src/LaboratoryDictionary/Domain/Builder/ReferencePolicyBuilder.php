<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Builder;

use App\LaboratoryDictionary\Domain\Enum\Gender;
use App\LaboratoryDictionary\Domain\Enum\MenstrualPhase;
use App\LaboratoryDictionary\Domain\Enum\PregnancyTrimester;
use App\LaboratoryDictionary\Domain\Model\AgeRange;
use App\LaboratoryDictionary\Domain\Model\ReferencePolicy;

class ReferencePolicyBuilder
{
    private ?Gender $gender = null;
    private ?AgeRange $ageRange = null;
    private ?PregnancyTrimester $pregnancyTrimester = null;
    private ?MenstrualPhase $menstrualPhase = null;

    public function withGender(Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function withAgeRange(?AgeRange $ageRange): self
    {
        $this->ageRange = $ageRange;

        return $this;
    }

    public function withPregnancyTrimester(?PregnancyTrimester $trimester): self
    {
        $this->pregnancyTrimester = $trimester;

        return $this;
    }

    public function withMenstrualPhase(?MenstrualPhase $phase): self
    {
        $this->menstrualPhase = $phase;

        return $this;
    }

    public static function from(ReferencePolicy $policy): self
    {
        return new self()
            ->withGender($policy->getGender())
            ->withAgeRange($policy->getAgeRange())
            ->withPregnancyTrimester($policy->getPregnancyTrimester())
            ->withMenstrualPhase($policy->getMenstrualPhase());
    }

    public function build(): ReferencePolicy
    {
        if (Gender::MALE === $this->gender && (null !== $this->pregnancyTrimester || null !== $this->menstrualPhase)) {
            throw new \LogicException('ReferencePolicy error: Мужская политика не может содержать данные о беременности или цикле.');
        }

        if (null !== $this->pregnancyTrimester && null !== $this->menstrualPhase) {
            throw new \LogicException('ReferencePolicy error: Нельзя указать одновременно триместр и фазу цикла.');
        }

        return new ReferencePolicy(
            $this->gender,
            $this->ageRange,
            $this->pregnancyTrimester,
            $this->menstrualPhase
        );
    }
}
