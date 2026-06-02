<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260513151429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add unique constraint to laboratory_dictionary.specimen_definitions';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE UNIQUE INDEX uq_specimen_definition_biomaterial_container_filler ON laboratory_dictionary.specimen_definitions(biomaterial, container_id, filler)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX laboratory_dictionary.uq_specimen_definition_biomaterial_container_filler');
    }
}
