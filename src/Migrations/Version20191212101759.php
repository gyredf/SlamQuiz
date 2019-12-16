<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212101759 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE tlt_question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tlt_question (id INT NOT NULL, categories_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_87CB4579A21214B7 ON tlt_question (categories_id)');
        $this->addSql('ALTER TABLE tlt_question ADD CONSTRAINT FK_87CB4579A21214B7 FOREIGN KEY (categories_id) REFERENCES tlt_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tlt_answer ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tlt_answer ADD CONSTRAINT FK_30E7D2961E27F6BF FOREIGN KEY (question_id) REFERENCES tlt_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_30E7D2961E27F6BF ON tlt_answer (question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tlt_answer DROP CONSTRAINT FK_30E7D2961E27F6BF');
        $this->addSql('DROP SEQUENCE tlt_question_id_seq CASCADE');
        $this->addSql('DROP TABLE tlt_question');
        $this->addSql('DROP INDEX IDX_30E7D2961E27F6BF');
        $this->addSql('ALTER TABLE tlt_answer DROP question_id');
    }
}
