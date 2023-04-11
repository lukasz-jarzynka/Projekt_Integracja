<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411165703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE xml_data_result ADD get_xml_data_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE xml_data_result ADD CONSTRAINT FK_E7940D80CE00AADB FOREIGN KEY (get_xml_data_id) REFERENCES get_xml_data (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E7940D80CE00AADB ON xml_data_result (get_xml_data_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE xml_data_result DROP CONSTRAINT FK_E7940D80CE00AADB');
        $this->addSql('DROP INDEX IDX_E7940D80CE00AADB');
        $this->addSql('ALTER TABLE xml_data_result DROP get_xml_data_id');
    }
}
