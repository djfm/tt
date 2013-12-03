<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131203203914 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE MessageData DROP FOREIGN KEY FK_EF03409C1919B217");
        $this->addSql("DROP INDEX IDX_EF03409C1919B217 ON MessageData");
        $this->addSql("ALTER TABLE MessageData DROP pack_id");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE MessageData ADD pack_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE MessageData ADD CONSTRAINT FK_EF03409C1919B217 FOREIGN KEY (pack_id) REFERENCES Pack (id)");
        $this->addSql("CREATE INDEX IDX_EF03409C1919B217 ON MessageData (pack_id)");
    }
}
