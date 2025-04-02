<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250402140301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil DROP FOREIGN KEY FK_4B3D7AC3FDFA38D5
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE magasin2
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4B3D7AC3FDFA38D5 ON vigil
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil CHANGE magasin2_id magasin1_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil ADD CONSTRAINT FK_4B3D7AC3EF4F973B FOREIGN KEY (magasin1_id) REFERENCES magasin1 (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4B3D7AC3EF4F973B ON vigil (magasin1_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE magasin2 (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, type VARCHAR(60) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, localisation VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil DROP FOREIGN KEY FK_4B3D7AC3EF4F973B
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4B3D7AC3EF4F973B ON vigil
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil CHANGE magasin1_id magasin2_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil ADD CONSTRAINT FK_4B3D7AC3FDFA38D5 FOREIGN KEY (magasin2_id) REFERENCES magasin2 (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4B3D7AC3FDFA38D5 ON vigil (magasin2_id)
        SQL);
    }
}
