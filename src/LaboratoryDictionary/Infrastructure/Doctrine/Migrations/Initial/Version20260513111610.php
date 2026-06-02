<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260513111610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create laboratory_dictionary.units table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE laboratory_dictionary.units (
                     id UUID NOT NULL,
                     code TEXT NOT NULL,
                     title TEXT NOT NULL,
                     description TEXT DEFAULT NULL,
                     classification laboratory_dictionary.unit_classification NOT NULL,
                     PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX uq_units_code ON laboratory_dictionary.units (code)');
        $this->addSql('CREATE UNIQUE INDEX uq_units_title ON laboratory_dictionary.units (title)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE laboratory_dictionary.units');
    }
}
