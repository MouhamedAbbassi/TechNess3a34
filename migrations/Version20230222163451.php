<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222163451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, capacite INT NOT NULL, local VARCHAR(255) NOT NULL, date DATE NOT NULL, prix VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, nb_dose INT NOT NULL, prix INT NOT NULL, stock INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicament_pharmacie (medicament_id INT NOT NULL, pharmacie_id INT NOT NULL, INDEX IDX_804E4447AB0D61F7 (medicament_id), INDEX IDX_804E4447BC6D351B (pharmacie_id), PRIMARY KEY(medicament_id, pharmacie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharmacie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, tempo TIME NOT NULL, tempf TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medicament_pharmacie ADD CONSTRAINT FK_804E4447AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicament_pharmacie ADD CONSTRAINT FK_804E4447BC6D351B FOREIGN KEY (pharmacie_id) REFERENCES pharmacie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user DROP notefinale');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicament_pharmacie DROP FOREIGN KEY FK_804E4447AB0D61F7');
        $this->addSql('ALTER TABLE medicament_pharmacie DROP FOREIGN KEY FK_804E4447BC6D351B');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE medicament');
        $this->addSql('DROP TABLE medicament_pharmacie');
        $this->addSql('DROP TABLE pharmacie');
        $this->addSql('ALTER TABLE `user` ADD notefinale DOUBLE PRECISION DEFAULT NULL');
    }
}
