<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180606142815 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE experiences (id INT AUTO_INCREMENT NOT NULL, date_start_id INT NOT NULL, date_end_id INT NOT NULL, place_id INT NOT NULL, exp_title VARCHAR(255) NOT NULL, exp_description LONGTEXT NOT NULL, INDEX IDX_82020E70A108903D (date_start_id), INDEX IDX_82020E70609B5F3 (date_end_id), INDEX IDX_82020E70DA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dates (id INT AUTO_INCREMENT NOT NULL, year VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E70A108903D FOREIGN KEY (date_start_id) REFERENCES dates (id)');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E70609B5F3 FOREIGN KEY (date_end_id) REFERENCES dates (id)');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E70DA6A219 FOREIGN KEY (place_id) REFERENCES places (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE experiences DROP FOREIGN KEY FK_82020E70A108903D');
        $this->addSql('ALTER TABLE experiences DROP FOREIGN KEY FK_82020E70609B5F3');
        $this->addSql('DROP TABLE experiences');
        $this->addSql('DROP TABLE dates');
    }
}
