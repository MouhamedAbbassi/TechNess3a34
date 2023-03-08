<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301114320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE panierx (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_medica_id INT NOT NULL, qte INT NOT NULL, prix DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_DF4B49BE79F37AE5 (id_user_id), INDEX IDX_DF4B49BEC711D718 (id_medica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE panierx ADD CONSTRAINT FK_DF4B49BE79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE panierx ADD CONSTRAINT FK_DF4B49BEC711D718 FOREIGN KEY (id_medica_id) REFERENCES medicament (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panierx DROP FOREIGN KEY FK_DF4B49BE79F37AE5');
        $this->addSql('ALTER TABLE panierx DROP FOREIGN KEY FK_DF4B49BEC711D718');
        $this->addSql('DROP TABLE panierx');
    }
}
