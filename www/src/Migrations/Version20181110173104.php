<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181110173104 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE lift_orders_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE lift_orders (id INT NOT NULL, lift_id INT DEFAULT NULL, floor INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9AA838FE95AE0E79 ON lift_orders (lift_id)');
        $this->addSql('ALTER TABLE lift_orders ADD CONSTRAINT FK_9AA838FE95AE0E79 FOREIGN KEY (lift_id) REFERENCES lifts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE lift_orders_id_seq CASCADE');
        $this->addSql('DROP TABLE lift_orders');
    }
}
