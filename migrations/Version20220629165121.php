<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220629165121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team_work_space (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, work_space_id INT NOT NULL, proposition LONGTEXT NOT NULL, is_granted TINYINT(1) NOT NULL, INDEX IDX_3F50C8D0296CD8AE (team_id), INDEX IDX_3F50C8D0F6E2D91C (work_space_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_work_space ADD CONSTRAINT FK_3F50C8D0296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team_work_space ADD CONSTRAINT FK_3F50C8D0F6E2D91C FOREIGN KEY (work_space_id) REFERENCES work_space (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE team_work_space');
    }
}
