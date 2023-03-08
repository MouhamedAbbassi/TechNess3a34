<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303200242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panierx DROP FOREIGN KEY FK_DF4B49BE79F37AE5');
        $this->addSql('DROP INDEX IDX_DF4B49BE79F37AE5 ON panierx');
        $this->addSql('ALTER TABLE panierx DROP id_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panierx ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE panierx ADD CONSTRAINT FK_DF4B49BE79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DF4B49BE79F37AE5 ON panierx (id_user_id)');
    }
}
