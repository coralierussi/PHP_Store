<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250402134549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE magasin1_user (magasin1_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B627C64FEF4F973B (magasin1_id), INDEX IDX_B627C64FA76ED395 (user_id), PRIMARY KEY(magasin1_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE magasin1_user ADD CONSTRAINT FK_B627C64FEF4F973B FOREIGN KEY (magasin1_id) REFERENCES magasin1 (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE magasin1_user ADD CONSTRAINT FK_B627C64FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE magasin1_user DROP FOREIGN KEY FK_B627C64FEF4F973B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE magasin1_user DROP FOREIGN KEY FK_B627C64FA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE magasin1_user
        SQL);
    }
}
