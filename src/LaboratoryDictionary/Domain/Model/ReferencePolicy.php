<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Model;

use App\LaboratoryDictionary\Domain\Builder\ReferencePolicyBuilder;
use App\LaboratoryDictionary\Domain\Enum\Gender;
use App\LaboratoryDictionary\Domain\Enum\MenstrualPhase;
use App\LaboratoryDictionary\Domain\Enum\PregnancyTrimester;

final class ReferencePolicy
{
    public function __construct(
        private readonly ?Gender $gender,
        private readonly ?AgeRange $ageRange,
        private readonly ?PregnancyTrimester $pregnancyTrimester,
        private readonly ?MenstrualPhase $menstrualPhase,
    ) {
    }

    public function getGender(): ?Gender
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

    public function toBuilder(): ReferencePolicyBuilder
    {
        return ReferencePolicyBuilder::from($this);
    }
}
