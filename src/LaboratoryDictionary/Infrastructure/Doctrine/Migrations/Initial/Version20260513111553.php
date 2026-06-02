<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260513111553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create laboratory_dictionary.specimen_definitions table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE laboratory_dictionary.specimen_definitions (
                      id UUID NOT NULL,
                      biomaterial TEXT NOT NULL,
                      filler TEXT,
                      temperature_condition TEXT,
                      stability_period TEXT,
                      preparation_requirements TEXT,
                      container_id UUID NOT NULL,
                      PRIMARY KEY (id))');

        $this->addSql('CREATE INDEX idx_specimen_definitions_container_id ON laboratory_dictionary.specimen_definitions (container_id)');

        $this->addSql('ALTER TABLE laboratory_dictionary.specimen_definitions ADD CONSTRAINT fk_specimen_definitions_container_id FOREIGN KEY (container_id) REFERENCES laboratory_dictionary.containers (id) NOT DEFERRABLE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE laboratory_dictionary.specimen_definitions DROP CONSTRAINT fk_specimen_definitions_container_id');
        $this->addSql('DROP TABLE laboratory_dictionary.specimen_definitions');
    }
}
