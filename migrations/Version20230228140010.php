<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228140010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723AD297762C');
        $this->addSql('DROP INDEX IDX_9A9C723AD297762C ON medicament');
        $this->addSql('ALTER TABLE medicament DROP idmedicament_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament ADD idmedicament_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723AD297762C FOREIGN KEY (idmedicament_id) REFERENCES panier (id)');
        $this->addSql('CREATE INDEX IDX_9A9C723AD297762C ON medicament (idmedicament_id)');
    }
}
