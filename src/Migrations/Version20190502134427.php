<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190502134427 extends AbstractMigration
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
        $this->addSql('CREATE TABLE attribute (id INT AUTO_INCREMENT NOT NULL, disadvattribute_id INT DEFAULT NULL, advattribute_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_FA7AEFFBD613D1D6 (disadvattribute_id), INDEX IDX_FA7AEFFB6E45D612 (advattribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE buffs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, value INT DEFAULT NULL, stat_effect INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE debuffs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, value INT DEFAULT NULL, stat_effect INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, engage TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, numbers_of_membres INT NOT NULL, leader VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild_war (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild_war_guild (guild_war_id INT NOT NULL, guild_id INT NOT NULL, INDEX IDX_D1C2A2D954B0C0FD (guild_war_id), INDEX IDX_D1C2A2D95F2131EF (guild_id), PRIMARY KEY(guild_war_id, guild_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guild_war_team (guild_war_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_97FBB97954B0C0FD (guild_war_id), INDEX IDX_97FBB979296CD8AE (team_id), PRIMARY KEY(guild_war_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lose (id INT AUTO_INCREMENT NOT NULL, team_att VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mob (id INT AUTO_INCREMENT NOT NULL, attribute_id INT DEFAULT NULL, runes_id INT DEFAULT NULL, account_id INT DEFAULT NULL, idin_game INT NOT NULL, name VARCHAR(255) NOT NULL, family VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, grade_nat INT NOT NULL, devilmon INT NOT NULL, awake LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_FE97F67DB6E62EFA (attribute_id), INDEX IDX_FE97F67DB6A1334F (runes_id), INDEX IDX_FE97F67D9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE other_effect (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rune (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, idin_game INT NOT NULL, slot INT NOT NULL, innet_grade INT NOT NULL, grade INT NOT NULL, idset INT NOT NULL, rank INT NOT NULL, upgrade_current INT NOT NULL, main_stat LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', innet_stat LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ids_substats LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', values_substats LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', values_grindstone LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', gemstone LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_74EECE4E9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, mobs_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, skill_up INT NOT NULL, state TINYINT(1) NOT NULL, passif TINYINT(1) NOT NULL, leader_skill LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', skill_awake TINYINT(1) NOT NULL, image VARCHAR(255) DEFAULT NULL, element VARCHAR(255) NOT NULL, INDEX IDX_5E3DE4778DD778A9 (mobs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_buffs (skill_id INT NOT NULL, buffs_id INT NOT NULL, INDEX IDX_EAE84B975585C142 (skill_id), INDEX IDX_EAE84B9761E9FAD9 (buffs_id), PRIMARY KEY(skill_id, buffs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_debuffs (skill_id INT NOT NULL, debuffs_id INT NOT NULL, INDEX IDX_A9BB98FE5585C142 (skill_id), INDEX IDX_A9BB98FE29B92D27 (debuffs_id), PRIMARY KEY(skill_id, debuffs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_other_effect (skill_id INT NOT NULL, other_effect_id INT NOT NULL, INDEX IDX_150A3BE85585C142 (skill_id), INDEX IDX_150A3BE82B16318E (other_effect_id), PRIMARY KEY(skill_id, other_effect_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stats (id INT AUTO_INCREMENT NOT NULL, mobs_id INT NOT NULL, idin_game INT NOT NULL, health_points INT NOT NULL, level INT NOT NULL, grade INT NOT NULL, attack INT NOT NULL, defense INT NOT NULL, speed INT NOT NULL, critical_rate INT NOT NULL, critical_damage INT NOT NULL, resistance INT NOT NULL, accuracy INT NOT NULL, INDEX IDX_574767AA8DD778A9 (mobs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, INDEX IDX_C4E0A61F9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_mob (team_id INT NOT NULL, mob_id INT NOT NULL, INDEX IDX_A4047CD9296CD8AE (team_id), INDEX IDX_A4047CD916E57E11 (mob_id), PRIMARY KEY(team_id, mob_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_win (team_id INT NOT NULL, win_id INT NOT NULL, INDEX IDX_EA59B1D2296CD8AE (team_id), INDEX IDX_EA59B1D2713E15F4 (win_id), PRIMARY KEY(team_id, win_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_lose (team_id INT NOT NULL, lose_id INT NOT NULL, INDEX IDX_FB145023296CD8AE (team_id), INDEX IDX_FB145023352C56C (lose_id), PRIMARY KEY(team_id, lose_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE win (id INT AUTO_INCREMENT NOT NULL, team_att VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A45F2131EF FOREIGN KEY (guild_id) REFERENCES guild (id)');
        $this->addSql('ALTER TABLE account_event ADD CONSTRAINT FK_D21D3D69B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE account_event ADD CONSTRAINT FK_D21D3D671F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT FK_FA7AEFFBD613D1D6 FOREIGN KEY (disadvattribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE attribute ADD CONSTRAINT FK_FA7AEFFB6E45D612 FOREIGN KEY (advattribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE guild_war_guild ADD CONSTRAINT FK_D1C2A2D954B0C0FD FOREIGN KEY (guild_war_id) REFERENCES guild_war (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guild_war_guild ADD CONSTRAINT FK_D1C2A2D95F2131EF FOREIGN KEY (guild_id) REFERENCES guild (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guild_war_team ADD CONSTRAINT FK_97FBB97954B0C0FD FOREIGN KEY (guild_war_id) REFERENCES guild_war (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE guild_war_team ADD CONSTRAINT FK_97FBB979296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mob ADD CONSTRAINT FK_FE97F67DB6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE mob ADD CONSTRAINT FK_FE97F67DB6A1334F FOREIGN KEY (runes_id) REFERENCES rune (id)');
        $this->addSql('ALTER TABLE mob ADD CONSTRAINT FK_FE97F67D9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE rune ADD CONSTRAINT FK_74EECE4E9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4778DD778A9 FOREIGN KEY (mobs_id) REFERENCES mob (id)');
        $this->addSql('ALTER TABLE skill_buffs ADD CONSTRAINT FK_EAE84B975585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_buffs ADD CONSTRAINT FK_EAE84B9761E9FAD9 FOREIGN KEY (buffs_id) REFERENCES buffs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_debuffs ADD CONSTRAINT FK_A9BB98FE5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_debuffs ADD CONSTRAINT FK_A9BB98FE29B92D27 FOREIGN KEY (debuffs_id) REFERENCES debuffs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_other_effect ADD CONSTRAINT FK_150A3BE85585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_other_effect ADD CONSTRAINT FK_150A3BE82B16318E FOREIGN KEY (other_effect_id) REFERENCES other_effect (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stats ADD CONSTRAINT FK_574767AA8DD778A9 FOREIGN KEY (mobs_id) REFERENCES mob (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE team_mob ADD CONSTRAINT FK_A4047CD9296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_mob ADD CONSTRAINT FK_A4047CD916E57E11 FOREIGN KEY (mob_id) REFERENCES mob (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_win ADD CONSTRAINT FK_EA59B1D2296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_win ADD CONSTRAINT FK_EA59B1D2713E15F4 FOREIGN KEY (win_id) REFERENCES win (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_lose ADD CONSTRAINT FK_FB145023296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_lose ADD CONSTRAINT FK_FB145023352C56C FOREIGN KEY (lose_id) REFERENCES lose (id) ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE attribute DROP FOREIGN KEY FK_FA7AEFFBD613D1D6');
        $this->addSql('ALTER TABLE attribute DROP FOREIGN KEY FK_FA7AEFFB6E45D612');
        $this->addSql('ALTER TABLE mob DROP FOREIGN KEY FK_FE97F67DB6E62EFA');
        $this->addSql('ALTER TABLE skill_buffs DROP FOREIGN KEY FK_EAE84B9761E9FAD9');
        $this->addSql('ALTER TABLE skill_debuffs DROP FOREIGN KEY FK_A9BB98FE29B92D27');
        $this->addSql('ALTER TABLE account_event DROP FOREIGN KEY FK_D21D3D671F7E88B');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A45F2131EF');
        $this->addSql('ALTER TABLE guild_war_guild DROP FOREIGN KEY FK_D1C2A2D95F2131EF');
        $this->addSql('ALTER TABLE guild_war_guild DROP FOREIGN KEY FK_D1C2A2D954B0C0FD');
        $this->addSql('ALTER TABLE guild_war_team DROP FOREIGN KEY FK_97FBB97954B0C0FD');
        $this->addSql('ALTER TABLE team_lose DROP FOREIGN KEY FK_FB145023352C56C');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4778DD778A9');
        $this->addSql('ALTER TABLE stats DROP FOREIGN KEY FK_574767AA8DD778A9');
        $this->addSql('ALTER TABLE team_mob DROP FOREIGN KEY FK_A4047CD916E57E11');
        $this->addSql('ALTER TABLE skill_other_effect DROP FOREIGN KEY FK_150A3BE82B16318E');
        $this->addSql('ALTER TABLE mob DROP FOREIGN KEY FK_FE97F67DB6A1334F');
        $this->addSql('ALTER TABLE skill_buffs DROP FOREIGN KEY FK_EAE84B975585C142');
        $this->addSql('ALTER TABLE skill_debuffs DROP FOREIGN KEY FK_A9BB98FE5585C142');
        $this->addSql('ALTER TABLE skill_other_effect DROP FOREIGN KEY FK_150A3BE85585C142');
        $this->addSql('ALTER TABLE guild_war_team DROP FOREIGN KEY FK_97FBB979296CD8AE');
        $this->addSql('ALTER TABLE team_mob DROP FOREIGN KEY FK_A4047CD9296CD8AE');
        $this->addSql('ALTER TABLE team_win DROP FOREIGN KEY FK_EA59B1D2296CD8AE');
        $this->addSql('ALTER TABLE team_lose DROP FOREIGN KEY FK_FB145023296CD8AE');
        $this->addSql('ALTER TABLE team_win DROP FOREIGN KEY FK_EA59B1D2713E15F4');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE account_event');
        $this->addSql('DROP TABLE attribute');
        $this->addSql('DROP TABLE buffs');
        $this->addSql('DROP TABLE debuffs');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE guild');
        $this->addSql('DROP TABLE guild_war');
        $this->addSql('DROP TABLE guild_war_guild');
        $this->addSql('DROP TABLE guild_war_team');
        $this->addSql('DROP TABLE lose');
        $this->addSql('DROP TABLE mob');
        $this->addSql('DROP TABLE other_effect');
        $this->addSql('DROP TABLE rune');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_buffs');
        $this->addSql('DROP TABLE skill_debuffs');
        $this->addSql('DROP TABLE skill_other_effect');
        $this->addSql('DROP TABLE stats');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_mob');
        $this->addSql('DROP TABLE team_win');
        $this->addSql('DROP TABLE team_lose');
        $this->addSql('DROP TABLE win');
    }
}
