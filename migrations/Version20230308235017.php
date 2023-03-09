<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308235017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3FD02F13');
        $this->addSql('DROP INDEX IDX_AC6340B3FD02F13 ON `like`');
        $this->addSql('ALTER TABLE `like` DROP evenement_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492F23775F');
        $this->addSql('DROP INDEX IDX_8D93D6492F23775F ON user');
        $this->addSql('ALTER TABLE user DROP likes_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `like` ADD evenement_id INT NOT NULL');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_AC6340B3FD02F13 ON `like` (evenement_id)');
        $this->addSql('ALTER TABLE `user` ADD likes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6492F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D6492F23775F ON `user` (likes_id)');
    }
}
