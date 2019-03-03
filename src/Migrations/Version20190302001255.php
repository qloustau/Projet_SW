<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190302001255 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, guild_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, idin_game INT DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_7D3656A45F2131EF (guild_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE account_event (account_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_D21D3D69B6B5FBA (account_id), INDEX IDX_D21D3D671F7E88B (event_id), PRIMARY KEY(account_id, event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attribute (id INT AUTO_INCREMENT NOT NULL, advattribute_id INT DEFAULT NULL, disadvantage_id INT DEFAULT NULL, mob_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_FA7AEFFB6E45D612 (advattribute_id), INDEX IDX_FA7AEFFB7995CCA1 (disadvantage_id), INDEX IDX_FA7AEFFB16E57E11 (mob_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, engage TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, numbers_of_membres INT NOT NULL, leader VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild_war (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild_war_guild (guild_war_id INT NOT NULL, guild_id INT NOT NULL, INDEX IDX_D1C2A2D954B0C0FD (guild_war_id), INDEX IDX_D1C2A2D95F2131EF (guild_id), PRIMARY KEY(guild_war_id, guild_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild_war_team (guild_war_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_97FBB97954B0C0FD (guild_war_id), INDEX IDX_97FBB979296CD8AE (team_id), PRIMARY KEY(guild_war_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mob (id INT AUTO_INCREMENT NOT NULL, skills_id INT NOT NULL, runes_id INT DEFAULT NULL, account_id INT NOT NULL, name VARCHAR(255) NOT NULL, family VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, grade INT NOT NULL, health_points INT NOT NULL, attack INT NOT NULL, defense INT NOT NULL, speed INT NOT NULL, critical_rate INT NOT NULL, critical_damage INT NOT NULL, resistance INT NOT NULL, level INT NOT NULL, INDEX IDX_FE97F67D7FF61858 (skills_id), INDEX IDX_FE97F67DB6A1334F (runes_id), INDEX IDX_FE97F67D9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rune (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, slot INT NOT NULL, innet_grade INT NOT NULL, grade INT NOT NULL, idset INT NOT NULL, rank INT NOT NULL, upgrade_current INT NOT NULL, main_stat LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', innet_stat LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ids_substats LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', values_substats LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', values_grindstone LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', gemstone LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_74EECE4E9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, skill_up INT NOT NULL, state TINYINT(1) NOT NULL, leader_skill LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_status_effect (skill_id INT NOT NULL, status_effect_id INT NOT NULL, INDEX IDX_E5B634035585C142 (skill_id), INDEX IDX_E5B634037D7C387A (status_effect_id), PRIMARY KEY(skill_id, status_effect_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status_effect (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, state TINYINT(1) NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, INDEX IDX_C4E0A61F9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_mob (team_id INT NOT NULL, mob_id INT NOT NULL, INDEX IDX_A4047CD9296CD8AE (team_id), INDEX IDX_A4047CD916E57E11 (mob_id), PRIMARY KEY(team_id, mob_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_team (team_source INT NOT NULL, team_target INT NOT NULL, INDEX IDX_15015264299138AA (team_source), INDEX IDX_1501526430746825 (team_target), PRIMARY KEY(team_source, team_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A45F2131EF FOREIGN KEY (guild_id) REFERENCES guild (id)');
        $this->addSql('ALTER TABLE account_event ADD CONSTRAINT FK_D21D3D69B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE account_event ADD CONSTRAINT FK_D21D3D671F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT FK_FA7AEFFB6E45D612 FOREIGN KEY (advattribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT FK_FA7AEFFB7995CCA1 FOREIGN KEY (disadvantage_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT FK_FA7AEFFB16E57E11 FOREIGN KEY (mob_id) REFERENCES mob (id)');
        $this->addSql('ALTER TABLE guild_war_guild ADD CONSTRAINT FK_D1C2A2D954B0C0FD FOREIGN KEY (guild_war_id) REFERENCES guild_war (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guild_war_guild ADD CONSTRAINT FK_D1C2A2D95F2131EF FOREIGN KEY (guild_id) REFERENCES guild (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guild_war_team ADD CONSTRAINT FK_97FBB97954B0C0FD FOREIGN KEY (guild_war_id) REFERENCES guild_war (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guild_war_team ADD CONSTRAINT FK_97FBB979296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mob ADD CONSTRAINT FK_FE97F67D7FF61858 FOREIGN KEY (skills_id) REFERENCES skill (id)');
        $this->addSql('ALTER TABLE mob ADD CONSTRAINT FK_FE97F67DB6A1334F FOREIGN KEY (runes_id) REFERENCES rune (id)');
        $this->addSql('ALTER TABLE mob ADD CONSTRAINT FK_FE97F67D9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE rune ADD CONSTRAINT FK_74EECE4E9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE skill_status_effect ADD CONSTRAINT FK_E5B634035585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_status_effect ADD CONSTRAINT FK_E5B634037D7C387A FOREIGN KEY (status_effect_id) REFERENCES status_effect (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE team_mob ADD CONSTRAINT FK_A4047CD9296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_mob ADD CONSTRAINT FK_A4047CD916E57E11 FOREIGN KEY (mob_id) REFERENCES mob (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_team ADD CONSTRAINT FK_15015264299138AA FOREIGN KEY (team_source) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_team ADD CONSTRAINT FK_1501526430746825 FOREIGN KEY (team_target) REFERENCES team (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE account_event DROP FOREIGN KEY FK_D21D3D69B6B5FBA');
        $this->addSql('ALTER TABLE mob DROP FOREIGN KEY FK_FE97F67D9B6B5FBA');
        $this->addSql('ALTER TABLE rune DROP FOREIGN KEY FK_74EECE4E9B6B5FBA');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F9B6B5FBA');
        $this->addSql('ALTER TABLE attribute DROP FOREIGN KEY FK_FA7AEFFB6E45D612');
        $this->addSql('ALTER TABLE attribute DROP FOREIGN KEY FK_FA7AEFFB7995CCA1');
        $this->addSql('ALTER TABLE account_event DROP FOREIGN KEY FK_D21D3D671F7E88B');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A45F2131EF');
        $this->addSql('ALTER TABLE guild_war_guild DROP FOREIGN KEY FK_D1C2A2D95F2131EF');
        $this->addSql('ALTER TABLE guild_war_guild DROP FOREIGN KEY FK_D1C2A2D954B0C0FD');
        $this->addSql('ALTER TABLE guild_war_team DROP FOREIGN KEY FK_97FBB97954B0C0FD');
        $this->addSql('ALTER TABLE attribute DROP FOREIGN KEY FK_FA7AEFFB16E57E11');
        $this->addSql('ALTER TABLE team_mob DROP FOREIGN KEY FK_A4047CD916E57E11');
        $this->addSql('ALTER TABLE mob DROP FOREIGN KEY FK_FE97F67DB6A1334F');
        $this->addSql('ALTER TABLE mob DROP FOREIGN KEY FK_FE97F67D7FF61858');
        $this->addSql('ALTER TABLE skill_status_effect DROP FOREIGN KEY FK_E5B634035585C142');
        $this->addSql('ALTER TABLE skill_status_effect DROP FOREIGN KEY FK_E5B634037D7C387A');
        $this->addSql('ALTER TABLE guild_war_team DROP FOREIGN KEY FK_97FBB979296CD8AE');
        $this->addSql('ALTER TABLE team_mob DROP FOREIGN KEY FK_A4047CD9296CD8AE');
        $this->addSql('ALTER TABLE team_team DROP FOREIGN KEY FK_15015264299138AA');
        $this->addSql('ALTER TABLE team_team DROP FOREIGN KEY FK_1501526430746825');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE account_event');
        $this->addSql('DROP TABLE attribute');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE guild');
        $this->addSql('DROP TABLE guild_war');
        $this->addSql('DROP TABLE guild_war_guild');
        $this->addSql('DROP TABLE guild_war_team');
        $this->addSql('DROP TABLE mob');
        $this->addSql('DROP TABLE rune');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_status_effect');
        $this->addSql('DROP TABLE status_effect');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_mob');
        $this->addSql('DROP TABLE team_team');
    }
}
