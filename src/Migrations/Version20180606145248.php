<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180606145248 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, project_year_id INT DEFAULT NULL, place_id INT DEFAULT NULL, main_img_id INT DEFAULT NULL, sec_img_id INT DEFAULT NULL, project_name VARCHAR(255) NOT NULL, project_description LONGTEXT DEFAULT NULL, link_to_project VARCHAR(255) DEFAULT NULL, INDEX IDX_5C93B3A4D6DFF2C2 (project_year_id), INDEX IDX_5C93B3A4DA6A219 (place_id), UNIQUE INDEX UNIQ_5C93B3A45F762743 (main_img_id), UNIQUE INDEX UNIQ_5C93B3A4125192F6 (sec_img_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_skills (projects_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_14C58A8F1EDE0F55 (projects_id), INDEX IDX_14C58A8F7FF61858 (skills_id), PRIMARY KEY(projects_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skill VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4D6DFF2C2 FOREIGN KEY (project_year_id) REFERENCES dates (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4DA6A219 FOREIGN KEY (place_id) REFERENCES places (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A45F762743 FOREIGN KEY (main_img_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4125192F6 FOREIGN KEY (sec_img_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE projects_skills ADD CONSTRAINT FK_14C58A8F1EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_skills ADD CONSTRAINT FK_14C58A8F7FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE school CHANGE date_start_id date_start_id INT DEFAULT NULL, CHANGE date_end_id date_end_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE diploma_name diploma_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projects_skills DROP FOREIGN KEY FK_14C58A8F1EDE0F55');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A45F762743');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4125192F6');
        $this->addSql('ALTER TABLE projects_skills DROP FOREIGN KEY FK_14C58A8F7FF61858');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE projects_skills');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE skills');
        $this->addSql('ALTER TABLE school CHANGE date_start_id date_start_id INT DEFAULT NULL, CHANGE date_end_id date_end_id INT DEFAULT NULL, CHANGE place_id place_id INT DEFAULT NULL, CHANGE diploma_name diploma_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
