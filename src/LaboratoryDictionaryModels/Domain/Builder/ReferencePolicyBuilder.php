<?php

declare(strict_types=1);

namespace App\LaboratoryDictionaryModels\Domain\Builder;

use App\LaboratoryDictionaryModels\Domain\Enum\Gender;
use App\LaboratoryDictionaryModels\Domain\Enum\MenstrualPhase;
use App\LaboratoryDictionaryModels\Domain\Enum\PregnancyTrimester;
use App\LaboratoryDictionaryModels\Domain\Model\AgeRange;
use App\LaboratoryDictionaryModels\Domain\Model\ReferencePolicy;

class ReferencePolicyBuilder
{
    private Gender $gender = Gender::ANY;
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

    public function fromEntity(ReferencePolicy $policy): self
    {
        $this->gender = $policy->getGender();
        $this->ageRange = $policy->getAgeRange();
        $this->pregnancyTrimester = $policy->getPregnancyTrimester();
        $this->menstrualPhase = $policy->getMenstrualPhase();

        return $this;
    }

    public function build(): ReferencePolicy
    {
        return new ReferencePolicy(
            $this->gender,
            $this->ageRange,
            $this->pregnancyTrimester,
            $this->menstrualPhase
        );
    }
}
