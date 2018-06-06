<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180606150019 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE blog_articles (id INT AUTO_INCREMENT NOT NULL, article_title VARCHAR(255) DEFAULT NULL, article VARCHAR(255) DEFAULT NULL, publication_date VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blog_articles_images (blog_articles_id INT NOT NULL, images_id INT NOT NULL, INDEX IDX_E8DE16C4C78A6A32 (blog_articles_id), INDEX IDX_E8DE16C4D44F05E5 (images_id), PRIMARY KEY(blog_articles_id, images_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_articles_images ADD CONSTRAINT FK_E8DE16C4C78A6A32 FOREIGN KEY (blog_articles_id) REFERENCES blog_articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blog_articles_images ADD CONSTRAINT FK_E8DE16C4D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects CHANGE project_year_id project_year_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE main_img_id main_img_id INT DEFAULT NULL, CHANGE sec_img_id sec_img_id INT DEFAULT NULL, CHANGE link_to_project link_to_project VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE school CHANGE date_start_id date_start_id INT DEFAULT NULL, CHANGE date_end_id date_end_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE diploma_name diploma_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE images CHANGE picture picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE skills CHANGE skill skill VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog_articles_images DROP FOREIGN KEY FK_E8DE16C4C78A6A32');
        $this->addSql('DROP TABLE blog_articles');
        $this->addSql('DROP TABLE blog_articles_images');
        $this->addSql('ALTER TABLE images CHANGE picture picture VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE projects CHANGE project_year_id project_year_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE main_img_id main_img_id INT DEFAULT NULL, CHANGE sec_img_id sec_img_id INT DEFAULT NULL, CHANGE link_to_project link_to_project VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE school CHANGE date_start_id date_start_id INT DEFAULT NULL, CHANGE date_end_id date_end_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE diploma_name diploma_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE skills CHANGE skill skill VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
