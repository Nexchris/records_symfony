<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240623094759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vinyl ADD COLUMN artist_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vinyl ADD COLUMN album_title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vinyl ADD COLUMN label VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vinyl ADD COLUMN release_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE vinyl ADD COLUMN number_of_vinyls INTEGER NOT NULL');
        $this->addSql('ALTER TABLE vinyl ADD COLUMN category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vinyl ADD COLUMN vinyl_condition VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__vinyl AS SELECT id FROM vinyl');
        $this->addSql('DROP TABLE vinyl');
        $this->addSql('CREATE TABLE vinyl (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('INSERT INTO vinyl (id) SELECT id FROM __temp__vinyl');
        $this->addSql('DROP TABLE __temp__vinyl');
    }
}
