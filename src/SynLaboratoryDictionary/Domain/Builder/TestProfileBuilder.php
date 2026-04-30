<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Builder;

// 1. Добавляем правильные импорты
use App\SynLaboratoryDictionary\Domain\Model\TestProfile;
use Symfony\Component\Uid\Uuid;

class TestProfileBuilder
{
    private Uuid $id;
    private ?string $code = null;
    private ?string $title = null;
    // 2. Инициализируем массивом, чтобы избежать ошибок при addTest()
    private array $tests = [];

    public function __construct()
    {
        $this->id = Uuid::v7();
    }

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

    public function fillFromModel(TestProfile $profile): self
    {
        $this->id = $profile->getId();
        $this->code = $profile->getCode();
        $this->title = $profile->getTitle();
        $this->tests = $profile->getTests();

        return $this;
    }

    public function build(): TestProfile
    {
        return new TestProfile(
            $this->id,
            $this->code ?? throw new \InvalidArgumentException('Profile code is required'),
            $this->title ?? throw new \InvalidArgumentException('Profile title is required'),
            $this->tests
        );
    }
}
