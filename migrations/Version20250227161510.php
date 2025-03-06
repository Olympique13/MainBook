<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250227161510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseur ADD frs_product_id INT NOT NULL, DROP frs_product');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA326190005D FOREIGN KEY (frs_product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_369ECA326190005D ON fournisseur (frs_product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA326190005D');
        $this->addSql('DROP INDEX IDX_369ECA326190005D ON fournisseur');
        $this->addSql('ALTER TABLE fournisseur ADD frs_product VARCHAR(255) NOT NULL, DROP frs_product_id');
    }
}
