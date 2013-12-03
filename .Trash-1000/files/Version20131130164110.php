<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20131130164110 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("CREATE TABLE CurrentMapping (id INT AUTO_INCREMENT NOT NULL, message_id INT DEFAULT NULL, mapping_id INT DEFAULT NULL, locale VARCHAR(64) DEFAULT NULL, INDEX IDX_B5C55023537A1329 (message_id), INDEX IDX_B5C55023FABB77CC (mapping_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Mapping (id INT AUTO_INCREMENT NOT NULL, message_id INT DEFAULT NULL, translation_id INT DEFAULT NULL, user_id INT DEFAULT NULL, status_id INT DEFAULT NULL, INDEX IDX_865B1516537A1329 (message_id), INDEX IDX_865B15169CAA2B25 (translation_id), INDEX IDX_865B1516A76ED395 (user_id), INDEX IDX_865B15166BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Message (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, domain_id INT DEFAULT NULL, context_id INT DEFAULT NULL, locale VARCHAR(64) DEFAULT NULL, msgid LONGTEXT DEFAULT NULL, msgid_plural LONGTEXT DEFAULT NULL, INDEX IDX_790009E3166D1F9C (project_id), INDEX IDX_790009E3115F0EE5 (domain_id), INDEX IDX_790009E36B00C1CF (context_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE MessageCategorization (id INT AUTO_INCREMENT NOT NULL, message_id INT DEFAULT NULL, category_id INT DEFAULT NULL, INDEX IDX_ED9949E7537A1329 (message_id), INDEX IDX_ED9949E712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE MessageCategory (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, name VARCHAR(64) DEFAULT NULL, INDEX IDX_933F9E78166D1F9C (project_id), INDEX IDX_933F9E78727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE MessageComment (id INT AUTO_INCREMENT NOT NULL, message_id INT DEFAULT NULL, user_id INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_58B969A4537A1329 (message_id), INDEX IDX_58B969A4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE MessageData (id INT AUTO_INCREMENT NOT NULL, message_id INT DEFAULT NULL, pack_id INT DEFAULT NULL, `key` VARCHAR(64) DEFAULT NULL, value LONGTEXT DEFAULT NULL, INDEX IDX_EF03409C537A1329 (message_id), INDEX IDX_EF03409C1919B217 (pack_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Pack (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, user_id INT DEFAULT NULL, name VARCHAR(256) DEFAULT NULL, version VARCHAR(64) DEFAULT NULL, INDEX IDX_37ECF11D166D1F9C (project_id), INDEX IDX_37ECF11DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Project (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(256) DEFAULT NULL, INDEX IDX_E00EE972A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Translation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, locale VARCHAR(64) NOT NULL, plurality INT NOT NULL, msgstr LONGTEXT DEFAULT NULL, INDEX IDX_32F5CAB8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE User (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_2DA1797792FC23A8 (username_canonical), UNIQUE INDEX UNIQ_2DA17977A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Context (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, name VARCHAR(64) DEFAULT NULL, INDEX IDX_2DE0BCE2166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE Domain (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, name VARCHAR(64) DEFAULT NULL, INDEX IDX_A0051B3D166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE CurrentMapping ADD CONSTRAINT FK_B5C55023537A1329 FOREIGN KEY (message_id) REFERENCES Message (id)");
        $this->addSql("ALTER TABLE CurrentMapping ADD CONSTRAINT FK_B5C55023FABB77CC FOREIGN KEY (mapping_id) REFERENCES Mapping (id)");
        $this->addSql("ALTER TABLE Mapping ADD CONSTRAINT FK_865B1516537A1329 FOREIGN KEY (message_id) REFERENCES Message (id)");
        $this->addSql("ALTER TABLE Mapping ADD CONSTRAINT FK_865B15169CAA2B25 FOREIGN KEY (translation_id) REFERENCES Translation (id)");
        $this->addSql("ALTER TABLE Mapping ADD CONSTRAINT FK_865B1516A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE Mapping ADD CONSTRAINT FK_865B15166BF700BD FOREIGN KEY (status_id) REFERENCES Status (id)");
        $this->addSql("ALTER TABLE Message ADD CONSTRAINT FK_790009E3166D1F9C FOREIGN KEY (project_id) REFERENCES Project (id)");
        $this->addSql("ALTER TABLE Message ADD CONSTRAINT FK_790009E3115F0EE5 FOREIGN KEY (domain_id) REFERENCES Domain (id)");
        $this->addSql("ALTER TABLE Message ADD CONSTRAINT FK_790009E36B00C1CF FOREIGN KEY (context_id) REFERENCES Context (id)");
        $this->addSql("ALTER TABLE MessageCategorization ADD CONSTRAINT FK_ED9949E7537A1329 FOREIGN KEY (message_id) REFERENCES Message (id)");
        $this->addSql("ALTER TABLE MessageCategorization ADD CONSTRAINT FK_ED9949E712469DE2 FOREIGN KEY (category_id) REFERENCES MessageCategory (id)");
        $this->addSql("ALTER TABLE MessageCategory ADD CONSTRAINT FK_933F9E78166D1F9C FOREIGN KEY (project_id) REFERENCES Project (id)");
        $this->addSql("ALTER TABLE MessageCategory ADD CONSTRAINT FK_933F9E78727ACA70 FOREIGN KEY (parent_id) REFERENCES MessageCategory (id)");
        $this->addSql("ALTER TABLE MessageComment ADD CONSTRAINT FK_58B969A4537A1329 FOREIGN KEY (message_id) REFERENCES Message (id)");
        $this->addSql("ALTER TABLE MessageComment ADD CONSTRAINT FK_58B969A4A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE MessageData ADD CONSTRAINT FK_EF03409C537A1329 FOREIGN KEY (message_id) REFERENCES Message (id)");
        $this->addSql("ALTER TABLE MessageData ADD CONSTRAINT FK_EF03409C1919B217 FOREIGN KEY (pack_id) REFERENCES Pack (id)");
        $this->addSql("ALTER TABLE Pack ADD CONSTRAINT FK_37ECF11D166D1F9C FOREIGN KEY (project_id) REFERENCES Project (id)");
        $this->addSql("ALTER TABLE Pack ADD CONSTRAINT FK_37ECF11DA76ED395 FOREIGN KEY (user_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE Project ADD CONSTRAINT FK_E00EE972A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE Translation ADD CONSTRAINT FK_32F5CAB8A76ED395 FOREIGN KEY (user_id) REFERENCES User (id)");
        $this->addSql("ALTER TABLE Context ADD CONSTRAINT FK_2DE0BCE2166D1F9C FOREIGN KEY (project_id) REFERENCES Project (id)");
        $this->addSql("ALTER TABLE Domain ADD CONSTRAINT FK_A0051B3D166D1F9C FOREIGN KEY (project_id) REFERENCES Project (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE CurrentMapping DROP FOREIGN KEY FK_B5C55023FABB77CC");
        $this->addSql("ALTER TABLE CurrentMapping DROP FOREIGN KEY FK_B5C55023537A1329");
        $this->addSql("ALTER TABLE Mapping DROP FOREIGN KEY FK_865B1516537A1329");
        $this->addSql("ALTER TABLE MessageCategorization DROP FOREIGN KEY FK_ED9949E7537A1329");
        $this->addSql("ALTER TABLE MessageComment DROP FOREIGN KEY FK_58B969A4537A1329");
        $this->addSql("ALTER TABLE MessageData DROP FOREIGN KEY FK_EF03409C537A1329");
        $this->addSql("ALTER TABLE MessageCategorization DROP FOREIGN KEY FK_ED9949E712469DE2");
        $this->addSql("ALTER TABLE MessageCategory DROP FOREIGN KEY FK_933F9E78727ACA70");
        $this->addSql("ALTER TABLE MessageData DROP FOREIGN KEY FK_EF03409C1919B217");
        $this->addSql("ALTER TABLE Message DROP FOREIGN KEY FK_790009E3166D1F9C");
        $this->addSql("ALTER TABLE MessageCategory DROP FOREIGN KEY FK_933F9E78166D1F9C");
        $this->addSql("ALTER TABLE Pack DROP FOREIGN KEY FK_37ECF11D166D1F9C");
        $this->addSql("ALTER TABLE Context DROP FOREIGN KEY FK_2DE0BCE2166D1F9C");
        $this->addSql("ALTER TABLE Domain DROP FOREIGN KEY FK_A0051B3D166D1F9C");
        $this->addSql("ALTER TABLE Mapping DROP FOREIGN KEY FK_865B15166BF700BD");
        $this->addSql("ALTER TABLE Mapping DROP FOREIGN KEY FK_865B15169CAA2B25");
        $this->addSql("ALTER TABLE Mapping DROP FOREIGN KEY FK_865B1516A76ED395");
        $this->addSql("ALTER TABLE MessageComment DROP FOREIGN KEY FK_58B969A4A76ED395");
        $this->addSql("ALTER TABLE Pack DROP FOREIGN KEY FK_37ECF11DA76ED395");
        $this->addSql("ALTER TABLE Project DROP FOREIGN KEY FK_E00EE972A76ED395");
        $this->addSql("ALTER TABLE Translation DROP FOREIGN KEY FK_32F5CAB8A76ED395");
        $this->addSql("ALTER TABLE Message DROP FOREIGN KEY FK_790009E36B00C1CF");
        $this->addSql("ALTER TABLE Message DROP FOREIGN KEY FK_790009E3115F0EE5");
        $this->addSql("DROP TABLE CurrentMapping");
        $this->addSql("DROP TABLE Mapping");
        $this->addSql("DROP TABLE Message");
        $this->addSql("DROP TABLE MessageCategorization");
        $this->addSql("DROP TABLE MessageCategory");
        $this->addSql("DROP TABLE MessageComment");
        $this->addSql("DROP TABLE MessageData");
        $this->addSql("DROP TABLE Pack");
        $this->addSql("DROP TABLE Project");
        $this->addSql("DROP TABLE Status");
        $this->addSql("DROP TABLE Translation");
        $this->addSql("DROP TABLE User");
        $this->addSql("DROP TABLE Context");
        $this->addSql("DROP TABLE Domain");
    }
}
