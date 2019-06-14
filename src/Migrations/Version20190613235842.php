<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190613235842 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attribute ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE buffs ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE debuffs ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE skill ADD updated_at DATETIME DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE attribute DROP updated_at');
        $this->addSql('ALTER TABLE buffs DROP updated_at');
        $this->addSql('ALTER TABLE debuffs DROP updated_at');
        $this->addSql('ALTER TABLE skill DROP updated_at');
    }
}
