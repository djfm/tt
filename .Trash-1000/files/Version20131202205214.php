<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131202205214 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        $this->addSql("ALTER TABLE Mapping DROP FOREIGN KEY FK_865B15169CAA2B25");
        $this->addSql("DROP INDEX IDX_865B15169CAA2B25 ON Mapping");
        $this->addSql("ALTER TABLE Mapping ADD plurality INT NOT NULL");
        $this->addSql("ALTER TABLE Mapping ADD CONSTRAINT FK_865B15169CAA2B25997AA24A FOREIGN KEY (translation_id, plurality) REFERENCES Translation (id, plurality)");
        $this->addSql("CREATE INDEX IDX_865B15169CAA2B25997AA24A ON Mapping (translation_id, plurality)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Mapping DROP FOREIGN KEY FK_865B15169CAA2B25997AA24A");
        $this->addSql("DROP INDEX IDX_865B15169CAA2B25997AA24A ON Mapping");
        $this->addSql("ALTER TABLE Mapping DROP plurality");
        $this->addSql("ALTER TABLE Mapping ADD CONSTRAINT FK_865B15169CAA2B25 FOREIGN KEY (translation_id) REFERENCES Translation (id)");
        $this->addSql("CREATE INDEX IDX_865B15169CAA2B25 ON Mapping (translation_id)");
    }
}
