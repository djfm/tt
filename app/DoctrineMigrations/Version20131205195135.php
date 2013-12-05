<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131205195135 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE MappingComment CHANGE user_id user_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE MappingComment ADD CONSTRAINT FK_8B2D4611A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)");
        $this->addSql("CREATE INDEX IDX_8B2D4611A76ED395 ON MappingComment (user_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE MappingComment DROP FOREIGN KEY FK_8B2D4611A76ED395");
        $this->addSql("DROP INDEX IDX_8B2D4611A76ED395 ON MappingComment");
        $this->addSql("ALTER TABLE MappingComment CHANGE user_id user_id INT NOT NULL");
    }
}
