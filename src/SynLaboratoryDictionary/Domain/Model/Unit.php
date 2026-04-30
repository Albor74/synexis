<?php

declare(strict_types=1);

namespace App\SynLaboratoryDictionary\Domain\Model;

use App\SynLaboratoryDictionary\Domain\Enum\UnitClassification;
use Symfony\Component\Uid\Uuid;

final class Unit
{
    use HasBuilder;

    public function __construct(
        private readonly Uuid $id,
        private readonly string $code,
        private readonly string $title,
        private readonly ?string $description,
        private readonly UnitClassification $classification,
    ) {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description ?? '';
    }

    public function getClassification(): UnitClassification
    {
        return $this->classification;
    }
}
