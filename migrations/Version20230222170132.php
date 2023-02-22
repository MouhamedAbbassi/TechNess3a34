<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222170132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rate (id INT AUTO_INCREMENT NOT NULL, med_id INT DEFAULT NULL, make_rate_id INT DEFAULT NULL, note DOUBLE PRECISION NOT NULL, opinion VARCHAR(255) DEFAULT NULL, INDEX IDX_DFEC3F39793E396C (med_id), UNIQUE INDEX UNIQ_DFEC3F39CE727896 (make_rate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rate ADD CONSTRAINT FK_DFEC3F39793E396C FOREIGN KEY (med_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE rate ADD CONSTRAINT FK_DFEC3F39CE727896 FOREIGN KEY (make_rate_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rate DROP FOREIGN KEY FK_DFEC3F39793E396C');
        $this->addSql('ALTER TABLE rate DROP FOREIGN KEY FK_DFEC3F39CE727896');
        $this->addSql('DROP TABLE rate');
    }
}
