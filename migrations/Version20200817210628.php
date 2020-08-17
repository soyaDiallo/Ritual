<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200817210628 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_categorie_article CHANGE article_id article_id INT DEFAULT NULL, CHANGE categorie_article_id categorie_article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_commande CHANGE commande_id commande_id INT DEFAULT NULL, CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_menu CHANGE menu_id menu_id INT DEFAULT NULL, CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_prix CHANGE article_id article_id INT DEFAULT NULL, CHANGE prix_id prix_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_supplement CHANGE article_id article_id INT DEFAULT NULL, CHANGE supplement_id supplement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_supplement_prix CHANGE prix_id prix_id INT DEFAULT NULL, CHANGE article_supplement_id article_supplement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_restaurant_restaurant CHANGE restaurant_id restaurant_id INT DEFAULT NULL, CHANGE categorie_restaurant_id categorie_restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande CHANGE consommateur_id consommateur_id INT DEFAULT NULL, CHANGE position_favorite_id position_favorite_id INT DEFAULT NULL, CHANGE groupe_id groupe_id INT DEFAULT NULL, CHANGE restaurant_id restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande_supplement CHANGE commande_id commande_id INT DEFAULT NULL, CHANGE supplement_id supplement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consommateur CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE consommateur_groupe CHANGE consommateur_id consommateur_id INT DEFAULT NULL, CHANGE groupe_id groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire_menu CHANGE menu_id menu_id INT DEFAULT NULL, CHANGE horaire_id horaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire_restaurant CHANGE restaurant_id restaurant_id INT DEFAULT NULL, CHANGE horaire_id horaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu CHANGE restaurant_id restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE position_favorite CHANGE consommateur_id consommateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_categorie_article CHANGE article_id article_id INT DEFAULT NULL, CHANGE categorie_article_id categorie_article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_commande CHANGE commande_id commande_id INT DEFAULT NULL, CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_menu CHANGE menu_id menu_id INT DEFAULT NULL, CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_prix CHANGE article_id article_id INT DEFAULT NULL, CHANGE prix_id prix_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_supplement CHANGE article_id article_id INT DEFAULT NULL, CHANGE supplement_id supplement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article_supplement_prix CHANGE prix_id prix_id INT DEFAULT NULL, CHANGE article_supplement_id article_supplement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_restaurant_restaurant CHANGE restaurant_id restaurant_id INT DEFAULT NULL, CHANGE categorie_restaurant_id categorie_restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande CHANGE consommateur_id consommateur_id INT DEFAULT NULL, CHANGE position_favorite_id position_favorite_id INT DEFAULT NULL, CHANGE groupe_id groupe_id INT DEFAULT NULL, CHANGE restaurant_id restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande_supplement CHANGE commande_id commande_id INT DEFAULT NULL, CHANGE supplement_id supplement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE consommateur CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE consommateur_groupe CHANGE consommateur_id consommateur_id INT DEFAULT NULL, CHANGE groupe_id groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire_menu CHANGE menu_id menu_id INT DEFAULT NULL, CHANGE horaire_id horaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE horaire_restaurant CHANGE restaurant_id restaurant_id INT DEFAULT NULL, CHANGE horaire_id horaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE menu CHANGE restaurant_id restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE position_favorite CHANGE consommateur_id consommateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
