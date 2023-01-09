<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221224014128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` ADD weapon_id INT DEFAULT NULL, ADD armor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03495B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034F5AA3663 FOREIGN KEY (armor_id) REFERENCES armor (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB03495B82273 ON `character` (weapon_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_937AB034F5AA3663 ON `character` (armor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03495B82273');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034F5AA3663');
        $this->addSql('DROP INDEX UNIQ_937AB03495B82273 ON `character`');
        $this->addSql('DROP INDEX UNIQ_937AB034F5AA3663 ON `character`');
        $this->addSql('ALTER TABLE `character` DROP weapon_id, DROP armor_id');
    }
}
