<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180606141100 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE places (id INT AUTO_INCREMENT NOT NULL, city_id INT NOT NULL, place_name VARCHAR(255) NOT NULL, INDEX IDX_FEAF6C558BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C558BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id)');
        $this->addSql('ALTER TABLE presentation ADD place_id INT NOT NULL');
        $this->addSql('ALTER TABLE presentation ADD CONSTRAINT FK_9B66E893DA6A219 FOREIGN KEY (place_id) REFERENCES places (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9B66E893DA6A219 ON presentation (place_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE presentation DROP FOREIGN KEY FK_9B66E893DA6A219');
        $this->addSql('DROP TABLE places');
        $this->addSql('DROP INDEX UNIQ_9B66E893DA6A219 ON presentation');
        $this->addSql('ALTER TABLE presentation DROP place_id');
    }
}
