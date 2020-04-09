<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200404233154 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, category_name LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productlist (id INT AUTO_INCREMENT NOT NULL, category_id_id INT NOT NULL, unit_id_id INT NOT NULL, name LONGTEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, quantity INT NOT NULL, active_status TINYINT(1) NOT NULL, note LONGTEXT NOT NULL, INDEX IDX_E98CB5FD9777D11E (category_id_id), INDEX IDX_E98CB5FDF476E05C (unit_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, unit_name LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE productlist ADD CONSTRAINT FK_E98CB5FD9777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE productlist ADD CONSTRAINT FK_E98CB5FDF476E05C FOREIGN KEY (unit_id_id) REFERENCES unit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE productlist DROP FOREIGN KEY FK_E98CB5FD9777D11E');
        $this->addSql('ALTER TABLE productlist DROP FOREIGN KEY FK_E98CB5FDF476E05C');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE productlist');
        $this->addSql('DROP TABLE unit');
    }
}
