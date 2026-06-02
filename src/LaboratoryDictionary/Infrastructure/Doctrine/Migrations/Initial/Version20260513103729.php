<?php

declare(strict_types=1);

namespace App\LaboratoryDictionary\Infrastructure\Doctrine\Migrations\Initial;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260513103729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create laboratory_dictionary enum types';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TYPE laboratory_dictionary.age_unit AS ENUM ('days','months', 'years')");
        $this->addSql("CREATE TYPE laboratory_dictionary.gender AS ENUM ('male','female', 'any')");
        $this->addSql("CREATE TYPE laboratory_dictionary.menstrual_phase AS ENUM ('follicular','ovulatory', 'luteal', 'menopause', 'postmenopause')");
        $this->addSql("CREATE TYPE laboratory_dictionary.pregnancy_trimester AS ENUM ('not_pregnant','first_trimester', 'second_trimester', 'third_trimester', 'postpartum')");
        $this->addSql("CREATE TYPE laboratory_dictionary.test_definition_status AS ENUM ('active','deprecated', 'draft')");
        $this->addSql("CREATE TYPE laboratory_dictionary.unit_classification AS ENUM ('concentration','mass', 'volume', 'enzyme_activity')");
        $this->addSql("CREATE TYPE laboratory_dictionary.value_type AS ENUM ('quantitative','qualitative')");
    }

    public function down(Schema $schema): void
    {
        $this->addSql(
            'DROP TYPE
        laboratory_dictionary.age_unit,
        laboratory_dictionary.gender,
        laboratory_dictionary.menstrual_phase,
        laboratory_dictionary.pregnancy_trimester,
        laboratory_dictionary.test_definition_status,
        laboratory_dictionary.unit_classification,
        laboratory_dictionary.value_type'
        );
    }
}
