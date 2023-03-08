<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230301130003 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panierx DROP INDEX UNIQ_DF4B49BE79F37AE5, ADD INDEX IDX_DF4B49BE79F37AE5 (id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panierx DROP INDEX IDX_DF4B49BE79F37AE5, ADD UNIQUE INDEX UNIQ_DF4B49BE79F37AE5 (id_user_id)');
    }
}
