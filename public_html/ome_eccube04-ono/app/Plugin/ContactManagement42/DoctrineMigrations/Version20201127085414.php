<?php

namespace Plugin\ContactManagement42\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201127085414 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql("UPDATE plg_contact_management4_contact SET contact_date = create_date WHERE contact_date IS NULL");
    }

    public function down(Schema $schema) : void
    {
    }
}
