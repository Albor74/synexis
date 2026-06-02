<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260529110701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create test_profile_test_definitions table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE laboratory_dictionary.test_profile_test_definitions (
                     profile_code TEXT NOT NULL,
                     test_definition_id TEXT NOT NULL,
                     PRIMARY KEY (profile_code, test_definition_id))');

        $this->addSql('CREATE INDEX idx_profiles_code ON laboratory_dictionary.test_profile_test_definitions (profile_code)');

        $this->addSql('CREATE INDEX idx_test_definitions_active_id ON laboratory_dictionary.test_profile_test_definitions (test_definition_id)');

        $this->addSql('ALTER TABLE laboratory_dictionary.test_profile_test_definitions ADD CONSTRAINT fk_test_profiles_code FOREIGN KEY (profile_code) REFERENCES laboratory_dictionary.test_profiles (code) NOT DEFERRABLE');
        $this->addSql('ALTER TABLE laboratory_dictionary.test_profile_test_definitions ADD CONSTRAINT fk_test_definitions_active_id FOREIGN KEY (test_definition_id) REFERENCES laboratory_dictionary.test_definitions_active (id) NOT DEFERRABLE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE laboratory_dictionary.test_profile_test_definitions DROP CONSTRAINT fk_test_profiles_code');
        $this->addSql('ALTER TABLE laboratory_dictionary.test_profile_test_definitions DROP CONSTRAINT fk_test_definitions_active_id');
        $this->addSql('DROP TABLE laboratory_dictionary.test_profile_test_definitions');
    }
}
