<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210122160209 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, description LONGTEXT NOT NULL, username VARCHAR(100) NOT NULL, created_at DATETIME DEFAULT NULL, modified_at DATETIME DEFAULT NULL, INDEX IDX_D9BEC0C47ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME DEFAULT NULL, modified_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichier (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, modified_at DATETIME DEFAULT NULL, INDEX IDX_9B76551F7ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere_cours (filiere_id INT NOT NULL, cours_id INT NOT NULL, INDEX IDX_849ACE3A180AA129 (filiere_id), INDEX IDX_849ACE3A7ECF78B0 (cours_id), PRIMARY KEY(filiere_id, cours_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, filiere_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, user_id VARCHAR(180) NOT NULL, image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_497B315EE7927C74 (email), UNIQUE INDEX UNIQ_497B315EA76ED395 (user_id), INDEX IDX_497B315E180AA129 (filiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C47ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE fichier ADD CONSTRAINT FK_9B76551F7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE filiere_cours ADD CONSTRAINT FK_849ACE3A180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filiere_cours ADD CONSTRAINT FK_849ACE3A7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C47ECF78B0');
        $this->addSql('ALTER TABLE fichier DROP FOREIGN KEY FK_9B76551F7ECF78B0');
        $this->addSql('ALTER TABLE filiere_cours DROP FOREIGN KEY FK_849ACE3A7ECF78B0');
        $this->addSql('ALTER TABLE filiere_cours DROP FOREIGN KEY FK_849ACE3A180AA129');
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315E180AA129');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE fichier');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE filiere_cours');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
