<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260529105215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create test_definitions_archive table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE laboratory_dictionary.test_definitions_archive (
                     id TEXT NOT NULL,
                     official_name TEXT DEFAULT NULL,
                     short_name TEXT DEFAULT NULL,
                     loinc_code TEXT DEFAULT NULL,
                     methodology TEXT DEFAULT NULL,
                     reference_rules_snapshot JSONB DEFAULT NULL,
                     category_snapshot JSONB DEFAULT NULL,
                     unit_snapshot JSONB DEFAULT NULL,
                     version INT NOT NULL,
                     specimen_definition_snapshot JSONB DEFAULT NULL,
                     value_type laboratory_dictionary.value_type NOT NULL,
                     result_options JSONB DEFAULT NULL,
                     PRIMARY KEY (id, version))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE laboratory_dictionary.test_definitions_archive');
    }
}
