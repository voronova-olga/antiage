<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180405060844 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE phone phone VARCHAR(20) DEFAULT NULL');
        $this->addSql('INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `is_active`, `name`, `surname`, `patronymic`, `reg_date`, `phone`) VALUES
(1,	\'admin\',	\'$2y$13$pi4uqVufIKj3U/88tzAc9eBVs/UqXOLMxvQwUQF32vrUsRYb1yOJq\',	\'admin@admin.ru\',	\'[\"ROLE_SUPER_ADMIN\"]\',	1,	\'admin\',	\'admin\',	\'admin\',	1522908555,	\'+7 (925) 865 8084\'),
(2,	\'user\',	\'$2y$13$UCffwzP3/WduCOArWfJLV.dv5TmJFIW2vucIps9M1n/.ADTFvk81.\',	\'user@user.ru\',	\'[\"ROLE_USER\"]\',	1,	\'user\',	\'user\',	\'user\',	1522911125,	\'+7 (925) 289 6649\'),
(3,	\'moderator\',	\'$2y$13$06nPEjAWnlG/QHLPaMEAWOedfuFPpUQx6r3uaEYRC4CKOVLDsFA1K\',	\'moderator@moderator.ru\',	\'[\"ROLE_ADMINISTRATOR\"]\',	1,	\'moderator\',	\'maderator\',	\'moderator\',	1522911237,	\'+7 (916) 123 4567\'),
(4,	\'author\',	\'$2y$13$JTSfoEJqMroOgIqsH6kxYuysKBqrDPNuvEXwn0uNByX30HaDrw5K2\',	\'author@author.ru\',	\'[\"ROLE_MASTER\"]\',	1,	\'author\',	\'author\',	\'author\',	1522911363,	\'+7 (123) 456 7899\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE phone phone VARCHAR(15) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
