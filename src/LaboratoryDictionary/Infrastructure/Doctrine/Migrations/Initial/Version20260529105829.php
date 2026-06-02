<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260529105829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create test_profiles table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE laboratory_dictionary.test_profiles (
                     code TEXT NOT NULL,
                     title TEXT NOT NULL,
                     PRIMARY KEY (code))');

        $this->addSql('CREATE UNIQUE INDEX uq_test_profiles_title ON laboratory_dictionary.test_profiles (title)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP Table laboratory_dictionary.test_profiles');
    }
}
