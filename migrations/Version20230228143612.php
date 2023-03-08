<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228143612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament ADD idmed_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE medicament ADD CONSTRAINT FK_9A9C723A1D8394C0 FOREIGN KEY (idmed_id) REFERENCES panier_item (id)');
        $this->addSql('CREATE INDEX IDX_9A9C723A1D8394C0 ON medicament (idmed_id)');
        $this->addSql('ALTER TABLE panier ADD idpanier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF289663B89 FOREIGN KEY (idpanier_id) REFERENCES panier_item (id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF289663B89 ON panier (idpanier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament DROP FOREIGN KEY FK_9A9C723A1D8394C0');
        $this->addSql('DROP INDEX IDX_9A9C723A1D8394C0 ON medicament');
        $this->addSql('ALTER TABLE medicament DROP idmed_id');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF289663B89');
        $this->addSql('DROP INDEX IDX_24CC0DF289663B89 ON panier');
        $this->addSql('ALTER TABLE panier DROP idpanier_id');
    }
}
