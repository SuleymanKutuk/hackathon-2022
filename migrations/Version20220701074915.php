<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220701074915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agency (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE channel (id INT AUTO_INCREMENT NOT NULL, chat_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A2F98E471A9A7125 (chat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chat (id INT AUTO_INCREMENT NOT NULL, work_space_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_659DF2AAF6E2D91C (work_space_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, channel_id INT DEFAULT NULL, sender_id INT DEFAULT NULL, recepirnt_id INT NOT NULL, message LONGTEXT NOT NULL, title VARCHAR(255) NOT NULL, createdat DATE NOT NULL, is_read TINYINT(1) NOT NULL, INDEX IDX_B6BD307F72F5A1AA (channel_id), INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307F11C84E4F (recepirnt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, agency_id INT DEFAULT NULL, project_type_id INT DEFAULT NULL, work_space_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, created_on DATE NOT NULL, status VARCHAR(255) NOT NULL, deadline DATE NOT NULL, INDEX IDX_2FB3D0EECDEADB2A (agency_id), UNIQUE INDEX UNIQ_2FB3D0EE535280F6 (project_type_id), UNIQUE INDEX UNIQ_2FB3D0EEF6E2D91C (work_space_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_type_used_language (project_type_id INT NOT NULL, used_language_id INT NOT NULL, INDEX IDX_D8592D4E535280F6 (project_type_id), INDEX IDX_D8592D4E3F080A66 (used_language_id), PRIMARY KEY(project_type_id, used_language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, agency_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C4E0A61FCDEADB2A (agency_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_work_space (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, work_space_id INT NOT NULL, proposition LONGTEXT NOT NULL, is_granted TINYINT(1) NOT NULL, INDEX IDX_3F50C8D0296CD8AE (team_id), INDEX IDX_3F50C8D0F6E2D91C (work_space_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, work_space_id INT DEFAULT NULL, label_id INT DEFAULT NULL, status_id INT DEFAULT NULL, user_id INT DEFAULT NULL, task VARCHAR(255) NOT NULL, predicted_time INT NOT NULL, description LONGTEXT NOT NULL, created_in DATE NOT NULL, INDEX IDX_97A0ADA3F6E2D91C (work_space_id), INDEX IDX_97A0ADA333B92F39 (label_id), INDEX IDX_97A0ADA36BF700BD (status_id), UNIQUE INDEX UNIQ_97A0ADA3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE used_language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_team (user_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_BE61EAD6A76ED395 (user_id), INDEX IDX_BE61EAD6296CD8AE (team_id), PRIMARY KEY(user_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_space (id INT AUTO_INCREMENT NOT NULL, interested TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE channel ADD CONSTRAINT FK_A2F98E471A9A7125 FOREIGN KEY (chat_id) REFERENCES chat (id)');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AAF6E2D91C FOREIGN KEY (work_space_id) REFERENCES work_space (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F72F5A1AA FOREIGN KEY (channel_id) REFERENCES channel (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F11C84E4F FOREIGN KEY (recepirnt_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EECDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE535280F6 FOREIGN KEY (project_type_id) REFERENCES project_type (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEF6E2D91C FOREIGN KEY (work_space_id) REFERENCES work_space (id)');
        $this->addSql('ALTER TABLE project_type_used_language ADD CONSTRAINT FK_D8592D4E535280F6 FOREIGN KEY (project_type_id) REFERENCES project_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_type_used_language ADD CONSTRAINT FK_D8592D4E3F080A66 FOREIGN KEY (used_language_id) REFERENCES used_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FCDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id)');
        $this->addSql('ALTER TABLE team_work_space ADD CONSTRAINT FK_3F50C8D0296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team_work_space ADD CONSTRAINT FK_3F50C8D0F6E2D91C FOREIGN KEY (work_space_id) REFERENCES work_space (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3F6E2D91C FOREIGN KEY (work_space_id) REFERENCES work_space (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA333B92F39 FOREIGN KEY (label_id) REFERENCES label (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA36BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EECDEADB2A');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FCDEADB2A');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F72F5A1AA');
        $this->addSql('ALTER TABLE channel DROP FOREIGN KEY FK_A2F98E471A9A7125');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA333B92F39');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE535280F6');
        $this->addSql('ALTER TABLE project_type_used_language DROP FOREIGN KEY FK_D8592D4E535280F6');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA36BF700BD');
        $this->addSql('ALTER TABLE team_work_space DROP FOREIGN KEY FK_3F50C8D0296CD8AE');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6296CD8AE');
        $this->addSql('ALTER TABLE project_type_used_language DROP FOREIGN KEY FK_D8592D4E3F080A66');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F11C84E4F');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3A76ED395');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6A76ED395');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AAF6E2D91C');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEF6E2D91C');
        $this->addSql('ALTER TABLE team_work_space DROP FOREIGN KEY FK_3F50C8D0F6E2D91C');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3F6E2D91C');
        $this->addSql('DROP TABLE agency');
        $this->addSql('DROP TABLE channel');
        $this->addSql('DROP TABLE chat');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_type');
        $this->addSql('DROP TABLE project_type_used_language');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_work_space');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE used_language');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_team');
        $this->addSql('DROP TABLE work_space');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
