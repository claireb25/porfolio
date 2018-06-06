<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180606143602 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, date_start_id INT DEFAULT NULL, date_end_id INT DEFAULT NULL, place_id INT DEFAULT NULL, diploma_name VARCHAR(255) DEFAULT NULL, INDEX IDX_F99EDABBA108903D (date_start_id), INDEX IDX_F99EDABB609B5F3 (date_end_id), INDEX IDX_F99EDABBDA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABBA108903D FOREIGN KEY (date_start_id) REFERENCES dates (id)');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABB609B5F3 FOREIGN KEY (date_end_id) REFERENCES dates (id)');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABBDA6A219 FOREIGN KEY (place_id) REFERENCES places (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE school');
    }
}
