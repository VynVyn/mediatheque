<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602145957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_document (categorie_id INT NOT NULL, document_id INT NOT NULL, INDEX IDX_E0EECB1CBCF5E72D (categorie_id), INDEX IDX_E0EECB1CC33F7837 (document_id), PRIMARY KEY(categorie_id, document_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_document ADD CONSTRAINT FK_E0EECB1CBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_document ADD CONSTRAINT FK_E0EECB1CC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE22BF396750 FOREIGN KEY (id) REFERENCES document (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie_document');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE22BF396750');
        $this->addSql('ALTER TABLE film CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }
}
