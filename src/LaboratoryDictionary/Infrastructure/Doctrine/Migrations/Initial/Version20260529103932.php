<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260529103932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create test_definitions_draft table ';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE laboratory_dictionary.test_definitions_draft (
                     id TEXT NOT NULL,
                     official_name TEXT NOT NULL,
                     short_name TEXT NOT NULL,
                     loinc_code TEXT NOT NULL,
                     methodology TEXT NOT NULL,
                     category_mnemonic TEXT NOT NULL,
                     unit_id UUID NOT NULL,
                     version INT NOT NULL,
                     specimen_definition_id UUID NOT NULL,
                     value_type laboratory_dictionary.value_type NOT NULL,
                     result_options JSONB DEFAULT NULL,
                     PRIMARY KEY (id))');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_draft ADD CONSTRAINT fk_test_categories_mnemonic FOREIGN KEY (category_mnemonic) REFERENCES laboratory_dictionary.test_categories (mnemonic) NOT DEFERRABLE');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_draft ADD CONSTRAINT FK_unit FOREIGN KEY (unit_id) REFERENCES laboratory_dictionary.units (id) NOT DEFERRABLE');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_draft ADD CONSTRAINT FK_specimen FOREIGN KEY (specimen_definition_id) REFERENCES laboratory_dictionary.specimen_definitions (id) NOT DEFERRABLE');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_draft ADD CONSTRAINT chk_version CHECK (version >= 0)');
        $this->addSql('CREATE UNIQUE INDEX uq_test_definitions_draft_official_name ON laboratory_dictionary.test_definitions_draft (official_name)');
        $this->addSql('CREATE UNIQUE INDEX uq_test_definitions_draft_short_name ON laboratory_dictionary.test_definitions_draft (short_name)');
        $this->addSql('CREATE UNIQUE INDEX uq_test_definitions_draft_loinc_code ON laboratory_dictionary.test_definitions_draft (loinc_code)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_draft DROP CONSTRAINT fk_test_categories_mnemonic ');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_draft DROP CONSTRAINT FK_unit ');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_draft DROP CONSTRAINT FK_specimen');

        $this->addSql('DROP TABLE laboratory_dictionary.test_definitions_draft');
    }
}
