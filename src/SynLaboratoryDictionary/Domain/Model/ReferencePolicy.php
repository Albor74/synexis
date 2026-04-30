<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

use App\SynLaboratoryDictionary\Domain\Enum\Gender;
use App\SynLaboratoryDictionary\Domain\Enum\MenstrualPhase;
use App\SynLaboratoryDictionary\Domain\Enum\PregnancyTrimester;

final class ReferencePolicy
{
    use HasBuilder;

    public function __construct(
        private readonly Gender $gender,
        private readonly ?AgeRange $ageRange,
        private readonly ?PregnancyTrimester $pregnancyTrimester,
        private readonly ?MenstrualPhase $menstrualPhase,
    ) {
    }

    public function getGender(): Gender
    {
        return $this->gender;
    }

    public function getAgeRange(): ?AgeRange
    {
        return $this->ageRange;
    }

    public function getPregnancyTrimester(): ?PregnancyTrimester
    {
        return $this->pregnancyTrimester;
    }

    public function getMenstrualPhase(): ?MenstrualPhase
    {
        return $this->menstrualPhase;
    }
}
