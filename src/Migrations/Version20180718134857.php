<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180718134857 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE presentation ADD cv VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE blog_articles CHANGE article_title article_title VARCHAR(255) DEFAULT NULL, CHANGE article article VARCHAR(255) DEFAULT NULL, CHANGE publication_date publication_date VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE images CHANGE picture picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE projects CHANGE project_year_id project_year_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE main_img_id main_img_id INT DEFAULT NULL, CHANGE sec_img_id sec_img_id INT DEFAULT NULL, CHANGE link_to_project link_to_project VARCHAR(255) DEFAULT NULL, CHANGE github_link github_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE school CHANGE date_start_id date_start_id INT DEFAULT NULL, CHANGE date_end_id date_end_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE diploma_name diploma_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE skills CHANGE skill skill VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blog_articles CHANGE article_title article_title VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE article article VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE publication_date publication_date VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE images CHANGE picture picture VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE presentation DROP cv');
        $this->addSql('ALTER TABLE projects CHANGE project_year_id project_year_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE main_img_id main_img_id INT DEFAULT NULL, CHANGE sec_img_id sec_img_id INT DEFAULT NULL, CHANGE link_to_project link_to_project VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE github_link github_link VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE school CHANGE date_start_id date_start_id INT DEFAULT NULL, CHANGE date_end_id date_end_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE diploma_name diploma_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE skills CHANGE skill skill VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
