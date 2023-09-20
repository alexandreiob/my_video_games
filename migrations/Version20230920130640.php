<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230920130640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux_videos ADD console_id INT NOT NULL');
        $this->addSql('ALTER TABLE jeux_videos ADD CONSTRAINT FK_6646E01472F9DD9F FOREIGN KEY (console_id) REFERENCES console (id)');
        $this->addSql('CREATE INDEX IDX_6646E01472F9DD9F ON jeux_videos (console_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jeux_videos DROP FOREIGN KEY FK_6646E01472F9DD9F');
        $this->addSql('DROP INDEX IDX_6646E01472F9DD9F ON jeux_videos');
        $this->addSql('ALTER TABLE jeux_videos DROP console_id');
    }
}
