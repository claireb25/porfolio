<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180606134917 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cities (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cities_countries (cities_id INT NOT NULL, countries_id INT NOT NULL, INDEX IDX_969AC168CAC75398 (cities_id), INDEX IDX_969AC168AEBAE514 (countries_id), PRIMARY KEY(cities_id, countries_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cities_countries ADD CONSTRAINT FK_969AC168CAC75398 FOREIGN KEY (cities_id) REFERENCES cities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cities_countries ADD CONSTRAINT FK_969AC168AEBAE514 FOREIGN KEY (countries_id) REFERENCES countries (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cities_countries DROP FOREIGN KEY FK_969AC168AEBAE514');
        $this->addSql('ALTER TABLE cities_countries DROP FOREIGN KEY FK_969AC168CAC75398');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE cities_countries');
    }
}
