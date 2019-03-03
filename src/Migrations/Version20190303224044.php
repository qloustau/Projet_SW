<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190303224044 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team_win (team_id INT NOT NULL, win_id INT NOT NULL, INDEX IDX_EA59B1D2296CD8AE (team_id), INDEX IDX_EA59B1D2713E15F4 (win_id), PRIMARY KEY(team_id, win_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_lose (team_id INT NOT NULL, lose_id INT NOT NULL, INDEX IDX_FB145023296CD8AE (team_id), INDEX IDX_FB145023352C56C (lose_id), PRIMARY KEY(team_id, lose_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_win ADD CONSTRAINT FK_EA59B1D2296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_win ADD CONSTRAINT FK_EA59B1D2713E15F4 FOREIGN KEY (win_id) REFERENCES win (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_lose ADD CONSTRAINT FK_FB145023296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_lose ADD CONSTRAINT FK_FB145023352C56C FOREIGN KEY (lose_id) REFERENCES lose (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F352C56C');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F713E15F4');
        $this->addSql('DROP INDEX IDX_C4E0A61F713E15F4 ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61F352C56C ON team');
        $this->addSql('ALTER TABLE team DROP lose_id, DROP win_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE team_win');
        $this->addSql('DROP TABLE team_lose');
        $this->addSql('ALTER TABLE team ADD lose_id INT DEFAULT NULL, ADD win_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F352C56C FOREIGN KEY (lose_id) REFERENCES lose (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F713E15F4 FOREIGN KEY (win_id) REFERENCES win (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F713E15F4 ON team (win_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F352C56C ON team (lose_id)');
    }
}
