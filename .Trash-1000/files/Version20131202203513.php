<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131202203513 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE PackMessage (id INT AUTO_INCREMENT NOT NULL, pack_id INT DEFAULT NULL, message_id INT DEFAULT NULL, INDEX IDX_211FD4971919B217 (pack_id), INDEX IDX_211FD497537A1329 (message_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE PackMessage ADD CONSTRAINT FK_211FD4971919B217 FOREIGN KEY (pack_id) REFERENCES Pack (id)");
        $this->addSql("ALTER TABLE PackMessage ADD CONSTRAINT FK_211FD497537A1329 FOREIGN KEY (message_id) REFERENCES Message (id)");
        $this->addSql("DROP TABLE MessagePack");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE MessagePack (id INT AUTO_INCREMENT NOT NULL, message_id INT NOT NULL, pack_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("DROP TABLE PackMessage");
    }
}
