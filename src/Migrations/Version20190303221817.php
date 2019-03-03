<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190303221817 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skill_status_effect DROP FOREIGN KEY FK_E5B634037D7C387A');
        $this->addSql('CREATE TABLE buffs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, value INT NOT NULL, stat_effect INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE debuffs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, value INT NOT NULL, stat_effect INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lose (id INT AUTO_INCREMENT NOT NULL, team_att VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_buffs (skill_id INT NOT NULL, buffs_id INT NOT NULL, INDEX IDX_EAE84B975585C142 (skill_id), INDEX IDX_EAE84B9761E9FAD9 (buffs_id), PRIMARY KEY(skill_id, buffs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_debuffs (skill_id INT NOT NULL, debuffs_id INT NOT NULL, INDEX IDX_A9BB98FE5585C142 (skill_id), INDEX IDX_A9BB98FE29B92D27 (debuffs_id), PRIMARY KEY(skill_id, debuffs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE win (id INT AUTO_INCREMENT NOT NULL, team_att VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_buffs ADD CONSTRAINT FK_EAE84B975585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_buffs ADD CONSTRAINT FK_EAE84B9761E9FAD9 FOREIGN KEY (buffs_id) REFERENCES buffs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_debuffs ADD CONSTRAINT FK_A9BB98FE5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_debuffs ADD CONSTRAINT FK_A9BB98FE29B92D27 FOREIGN KEY (debuffs_id) REFERENCES debuffs (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE skill_status_effect');
        $this->addSql('DROP TABLE status_effect');
        $this->addSql('DROP TABLE team_team');
        $this->addSql('ALTER TABLE team ADD win_id INT DEFAULT NULL, ADD lose_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F713E15F4 FOREIGN KEY (win_id) REFERENCES win (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F352C56C FOREIGN KEY (lose_id) REFERENCES lose (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F713E15F4 ON team (win_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F352C56C ON team (lose_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE skill_buffs DROP FOREIGN KEY FK_EAE84B9761E9FAD9');
        $this->addSql('ALTER TABLE skill_debuffs DROP FOREIGN KEY FK_A9BB98FE29B92D27');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F352C56C');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F713E15F4');
        $this->addSql('CREATE TABLE skill_status_effect (skill_id INT NOT NULL, status_effect_id INT NOT NULL, INDEX IDX_E5B634035585C142 (skill_id), INDEX IDX_E5B634037D7C387A (status_effect_id), PRIMARY KEY(skill_id, status_effect_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status_effect (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, state TINYINT(1) NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_team (team_source INT NOT NULL, team_target INT NOT NULL, INDEX IDX_15015264299138AA (team_source), INDEX IDX_1501526430746825 (team_target), PRIMARY KEY(team_source, team_target)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_status_effect ADD CONSTRAINT FK_E5B634035585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_status_effect ADD CONSTRAINT FK_E5B634037D7C387A FOREIGN KEY (status_effect_id) REFERENCES status_effect (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_team ADD CONSTRAINT FK_15015264299138AA FOREIGN KEY (team_source) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_team ADD CONSTRAINT FK_1501526430746825 FOREIGN KEY (team_target) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE buffs');
        $this->addSql('DROP TABLE debuffs');
        $this->addSql('DROP TABLE lose');
        $this->addSql('DROP TABLE skill_buffs');
        $this->addSql('DROP TABLE skill_debuffs');
        $this->addSql('DROP TABLE win');
        $this->addSql('DROP INDEX IDX_C4E0A61F713E15F4 ON team');
        $this->addSql('DROP INDEX IDX_C4E0A61F352C56C ON team');
        $this->addSql('ALTER TABLE team DROP win_id, DROP lose_id');
    }
}
