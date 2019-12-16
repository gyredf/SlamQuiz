<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216111538 extends AbstractMigration
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
        $this->addSql('CREATE SEQUENCE tlt_answer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tlt_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tlt_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tlt_question (id INT NOT NULL, categories_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_87CB4579A21214B7 ON tlt_question (categories_id)');
        $this->addSql('CREATE TABLE tlt_answer (id INT NOT NULL, question_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, correction INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_30E7D2961E27F6BF ON tlt_answer (question_id)');
        $this->addSql('CREATE TABLE tlt_category (id INT NOT NULL, shortname VARCHAR(50) NOT NULL, longname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tlt_user (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8709780AE7927C74 ON tlt_user (email)');
        $this->addSql('ALTER TABLE tlt_question ADD CONSTRAINT FK_87CB4579A21214B7 FOREIGN KEY (categories_id) REFERENCES tlt_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tlt_answer ADD CONSTRAINT FK_30E7D2961E27F6BF FOREIGN KEY (question_id) REFERENCES tlt_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tlt_answer DROP CONSTRAINT FK_30E7D2961E27F6BF');
        $this->addSql('ALTER TABLE tlt_question DROP CONSTRAINT FK_87CB4579A21214B7');
        $this->addSql('DROP SEQUENCE tlt_question_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tlt_answer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tlt_category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tlt_user_id_seq CASCADE');
        $this->addSql('DROP TABLE tlt_question');
        $this->addSql('DROP TABLE tlt_answer');
        $this->addSql('DROP TABLE tlt_category');
        $this->addSql('DROP TABLE tlt_user');
    }
}
