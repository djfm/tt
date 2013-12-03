<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131202195235 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE Mapping DROP FOREIGN KEY FK_865B15166BF700BD");
        $this->addSql("CREATE TABLE MappingComment (id INT AUTO_INCREMENT NOT NULL, mapping_id INT NOT NULL, user_id INT NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_8B2D4611FABB77CC (mapping_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE MappingFlag (id INT AUTO_INCREMENT NOT NULL, mapping_id INT NOT NULL, flag VARCHAR(64) NOT NULL, INDEX IDX_43CD8FF6FABB77CC (mapping_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE MappingComment ADD CONSTRAINT FK_8B2D4611FABB77CC FOREIGN KEY (mapping_id) REFERENCES Mapping (id)");
        $this->addSql("ALTER TABLE MappingFlag ADD CONSTRAINT FK_43CD8FF6FABB77CC FOREIGN KEY (mapping_id) REFERENCES Mapping (id)");
        $this->addSql("DROP TABLE Status");
        $this->addSql("DROP INDEX IDX_865B15166BF700BD ON Mapping");
        $this->addSql("ALTER TABLE Mapping DROP status_id");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE Status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("DROP TABLE MappingComment");
        $this->addSql("DROP TABLE MappingFlag");
        $this->addSql("ALTER TABLE Mapping ADD status_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE Mapping ADD CONSTRAINT FK_865B15166BF700BD FOREIGN KEY (status_id) REFERENCES Status (id)");
        $this->addSql("CREATE INDEX IDX_865B15166BF700BD ON Mapping (status_id)");
    }
}
