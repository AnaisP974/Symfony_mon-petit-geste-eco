<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321095032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_blog CHANGE image_name image_name VARCHAR(255) NOT NULL, CHANGE image_description image_description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE product CHANGE description description LONGTEXT NOT NULL, CHANGE description_image description_image LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_blog CHANGE image_name image_name VARCHAR(255) DEFAULT NULL, CHANGE image_description image_description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE product CHANGE description description LONGTEXT DEFAULT NULL, CHANGE description_image description_image VARCHAR(255) NOT NULL');
    }
}
