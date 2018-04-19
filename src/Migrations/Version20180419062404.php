<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180419062404 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) DEFAULT NULL, activate_date BIGINT NOT NULL, is_active TINYINT(1) NOT NULL, is_delete TINYINT(1) NOT NULL, title VARCHAR(255) DEFAULT NULL, anons LONGTEXT DEFAULT NULL, image_menu VARCHAR(36) DEFAULT NULL, image_anons VARCHAR(36) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE posts ADD image_menu VARCHAR(36) DEFAULT NULL, ADD image_anons VARCHAR(36) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_avatars CHANGE image image VARCHAR(36) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pages');
        $this->addSql('ALTER TABLE posts DROP image_menu, DROP image_anons');
        $this->addSql('ALTER TABLE user_avatars CHANGE image image VARCHAR(32) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
