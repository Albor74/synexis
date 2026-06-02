<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Domain\Builder;

use App\LaboratoryDictionary\Domain\Model\TestProfile;
use Symfony\Component\Uid\Uuid;

class TestProfileBuilder
{
    private Uuid $id;
    private ?string $code = null;
    private ?string $title = null;

    private array $tests = [];

    public function withId(Uuid $id): self
    {
        $this->id = $id;

        return $this;
    }

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

    public function withTests(array $tests): self
    {
        $this->tests = $tests;

        return $this;
    }

    public static function from(TestProfile $profile): self
    {
        return new self()
        ->withId($profile->getId())
        ->withCode($profile->getCode())
        ->withTitle($profile->getTitle())
        ->withTests($profile->getTests());
    }

    public function build(): TestProfile
    {
        return new TestProfile(
            $this->id ?? throw new \InvalidArgumentException('Id is required'),
            $this->code ?? throw new \InvalidArgumentException('Profile code is required'),
            $this->title ?? throw new \InvalidArgumentException('Profile title is required'),
            $this->tests
        );
    }
}
