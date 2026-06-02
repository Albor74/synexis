<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260513111436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create laboratory_dictionary.containers table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE laboratory_dictionary.containers (
                    id UUID NOT NULL,
                    color_title TEXT NOT NULL,
                     color_hex VARCHAR(7) NOT NULL,
                      volume NUMERIC(10, 4) NOT NULL,
                       PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX uq_container_color_volume ON laboratory_dictionary.containers (color_title, color_hex, volume)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE laboratory_dictionary.containers');
    }
}
