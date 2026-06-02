<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260529101946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create test_definitions_active table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE laboratory_dictionary.test_definitions_active (
                      id TEXT NOT NULL,
                      official_name TEXT NOT NULL,
                      short_name TEXT NOT NULL,
                      loinc_code TEXT NOT NULL,
                      methodology TEXT NOT NULL,
                      unit_id UUID NOT NULL,
                      version INT NOT NULL,
                      specimen_definition_id UUID NOT NULL,
                      value_type laboratory_dictionary.value_type NOT NULL,
                      result_options JSONB DEFAULT NULL,
                      category_mnemonic TEXT NOT NULL,
                      PRIMARY KEY (id))');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_active ADD CONSTRAINT fk_test_categories_mnemonic FOREIGN KEY (category_mnemonic) REFERENCES laboratory_dictionary.test_categories (mnemonic) NOT DEFERRABLE');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_active ADD CONSTRAINT FK_unit FOREIGN KEY (unit_id) REFERENCES laboratory_dictionary.units (id) NOT DEFERRABLE');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_active ADD CONSTRAINT FK_specimen_definition FOREIGN KEY (specimen_definition_id) REFERENCES laboratory_dictionary.specimen_definitions (id) NOT DEFERRABLE');

        $this->addSql('CREATE UNIQUE INDEX uq_test_definitions_active_official_name ON laboratory_dictionary.test_definitions_active (official_name)');
        $this->addSql('CREATE UNIQUE INDEX uq_test_definitions_active_short_name ON laboratory_dictionary.test_definitions_active (short_name)');
        $this->addSql('CREATE UNIQUE INDEX uq_test_definitions_active_loinc_code ON laboratory_dictionary.test_definitions_active (loinc_code)');
        $this->addSql('CREATE INDEX idx_category_mnemonic ON laboratory_dictionary.test_definitions_active (category_mnemonic)');
        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_active ADD CONSTRAINT chk_version CHECK (version >= 0)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_active DROP CONSTRAINT fk_test_categories_mnemonic');
        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_active DROP CONSTRAINT FK_unit');
        $this->addSql('ALTER TABLE laboratory_dictionary.test_definitions_active DROP CONSTRAINT FK_specimen_definition');
        $this->addSql('DROP TABLE laboratory_dictionary.test_definitions_active');
    }
}
