<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Entity;

use App\LaboratoryDictionary\Domain\Enum\ValueType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class TestDefinition
{
    #[ORM\Id]
    #[ORM\Column(type: Types::TEXT)]
    public readonly string $id;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    public protected(set) ?string $officialName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    public protected(set) ?string $shortName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    public protected(set) ?string $loincCode = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    public protected(set) ?string $methodology = null;

    #[ORM\Column(type: 'string', enumType: ValueType::class, nullable: true)]
    public protected(set) ?ValueType $valueType = null;

    #[ORM\Column(type: 'jsonb', nullable: true)]
    public protected(set) ?array $resultOptions = null;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
