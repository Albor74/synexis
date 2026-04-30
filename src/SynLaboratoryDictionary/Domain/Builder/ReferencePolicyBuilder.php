<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Builder;

use App\SynLaboratoryDictionary\Domain\Enum\Gender;
use App\SynLaboratoryDictionary\Domain\Enum\MenstrualPhase;
use App\SynLaboratoryDictionary\Domain\Enum\PregnancyTrimester;
use App\SynLaboratoryDictionary\Domain\Model\AgeRange;
use App\SynLaboratoryDictionary\Domain\Model\ReferencePolicy;

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

    public function fillFromModel(ReferencePolicy $policy): self
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
