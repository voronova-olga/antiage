<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180404175922 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE posts (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, anons LONGTEXT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, activate_date BIGINT NOT NULL, is_active TINYINT(1) NOT NULL, is_delete TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(60) NOT NULL, role VARCHAR(60) NOT NULL, is_active TINYINT(1) NOT NULL, name VARCHAR(50) DEFAULT NULL, surname VARCHAR(50) DEFAULT NULL, patronymic VARCHAR(50) DEFAULT NULL, reg_date BIGINT NOT NULL, phone VARCHAR(15) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_avatars (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, image VARCHAR(32) DEFAULT NULL, upload_date INT DEFAULT NULL, active TINYINT(1) DEFAULT \'1\' NOT NULL, `delete` TINYINT(1) DEFAULT \'0\' NOT NULL, `index` TINYINT(1) DEFAULT \'0\' NOT NULL, INDEX IDX_E8C49B2AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, description VARCHAR(255) DEFAULT NULL, constant VARCHAR(50) DEFAULT NULL, parent_constants VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_avatars ADD CONSTRAINT FK_E8C49B2AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('INSERT INTO `user_role` (`id`,`name`, `description`, `constant`, `parent_constants`, `is_active`) VALUES (1, \'Гость\', NULL, \'ROLE_GUEST\', NULL, \'1\')');
        $this->addSql('INSERT INTO `user_role` (`id`,`name`, `description`, `constant`, `parent_constants`, `is_active`) VALUES (2, \'Пользователь\', NULL, \'ROLE_USER\', NULL, \'1\')');
        $this->addSql('INSERT INTO `user_role` (`id`,`name`, `description`, `constant`, `parent_constants`, `is_active`) VALUES (3, \'Мастер\', NULL, \'ROLE_MASTER\', NULL, \'1\')');
        $this->addSql('INSERT INTO `user_role` (`id`,`name`, `description`, `constant`, `parent_constants`, `is_active`) VALUES (4, \'Администартор\', NULL, \'ROLE_ADMINISTRATOR\', NULL, \'1\')');
        $this->addSql('INSERT INTO `user_role` (`id`,`name`, `description`, `constant`, `parent_constants`, `is_active`) VALUES (5, \'Админ\', NULL, \'ROLE_ADMIN\', NULL, \'1\')');
        $this->addSql('INSERT INTO `user_role` (`id`,`name`, `description`, `constant`, `parent_constants`, `is_active`) VALUES (6, \'Супер админ\', NULL, \'ROLE_SUPER_ADMIN\', NULL, \'1\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_avatars DROP FOREIGN KEY FK_E8C49B2AA76ED395');
        $this->addSql('DROP TABLE posts');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_avatars');
        $this->addSql('DROP TABLE user_role');
    }
}
