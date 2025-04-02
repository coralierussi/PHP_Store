<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250402134807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil ADD magasin2_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil ADD CONSTRAINT FK_4B3D7AC3FDFA38D5 FOREIGN KEY (magasin2_id) REFERENCES magasin2 (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4B3D7AC3FDFA38D5 ON vigil (magasin2_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil DROP FOREIGN KEY FK_4B3D7AC3FDFA38D5
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4B3D7AC3FDFA38D5 ON vigil
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE vigil DROP magasin2_id
        SQL);
    }
}
