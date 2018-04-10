<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180406114028 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, post_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, body LONGTEXT DEFAULT NULL, admin_body LONGTEXT DEFAULT NULL, time BIGINT NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C4B89032C (post_id), INDEX IDX_9474526C727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_comment_raiting_detals (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, user_golos_id INT DEFAULT NULL, comment_id INT DEFAULT NULL, time BIGINT NOT NULL, INDEX IDX_94BA5153A76ED395 (user_id), INDEX IDX_94BA5153A6A1922A (user_golos_id), INDEX IDX_94BA5153F8697D13 (comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_raiting_detals (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, user_golos_id INT DEFAULT NULL, time BIGINT NOT NULL, INDEX IDX_4001C7B5A76ED395 (user_id), INDEX IDX_4001C7B5A6A1922A (user_golos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_last_comment_view (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, coment_id INT DEFAULT NULL, time BIGINT NOT NULL, INDEX IDX_7791455EA76ED395 (user_id), INDEX IDX_7791455E632B4AD1 (coment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES posts (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C727ACA70 FOREIGN KEY (parent_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE user_comment_raiting_detals ADD CONSTRAINT FK_94BA5153A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_comment_raiting_detals ADD CONSTRAINT FK_94BA5153A6A1922A FOREIGN KEY (user_golos_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_comment_raiting_detals ADD CONSTRAINT FK_94BA5153F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE user_raiting_detals ADD CONSTRAINT FK_4001C7B5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_raiting_detals ADD CONSTRAINT FK_4001C7B5A6A1922A FOREIGN KEY (user_golos_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE users_last_comment_view ADD CONSTRAINT FK_7791455EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE users_last_comment_view ADD CONSTRAINT FK_7791455E632B4AD1 FOREIGN KEY (coment_id) REFERENCES comment (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C727ACA70');
        $this->addSql('ALTER TABLE user_comment_raiting_detals DROP FOREIGN KEY FK_94BA5153F8697D13');
        $this->addSql('ALTER TABLE users_last_comment_view DROP FOREIGN KEY FK_7791455E632B4AD1');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE user_comment_raiting_detals');
        $this->addSql('DROP TABLE user_raiting_detals');
        $this->addSql('DROP TABLE users_last_comment_view');
    }
}
