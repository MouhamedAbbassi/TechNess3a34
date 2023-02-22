<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221171946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rate ADD make_rate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate ADD CONSTRAINT FK_DFEC3F39CE727896 FOREIGN KEY (make_rate_id) REFERENCES `user` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DFEC3F39CE727896 ON rate (make_rate_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rate DROP FOREIGN KEY FK_DFEC3F39CE727896');
        $this->addSql('DROP INDEX UNIQ_DFEC3F39CE727896 ON rate');
        $this->addSql('ALTER TABLE rate DROP make_rate_id');
    }
}
