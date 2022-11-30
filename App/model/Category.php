<?php

namespace App\Model;

use App\Utils\Database;


/**
 * Child class of Manager, helps manage categories of product
 */
class Category
{
    private $id_categorie;
    private $nom_categorie;
    private $description_categorie;
    private $image_categorie;

    /**
     * Collect every categories according to the flag.
     *
     * @return array
     */

    public static function findAll() : array
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM categorie ORDER BY nom_categorie';
        
        $pdoStatement = $pdo->query($sql);

        $categoriesList = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);

        return $categoriesList;
    }

    /**
     * Collect details from one categorie
     *
     * @param int $id
     * @return Product
     */
    public static function find(int $id) : Product
    {
        $pdo = Database::getPDO();

        $sql = '
            SELECT *
            FROM categorie
            WHERE id = ?';
        
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute(array($id));

        $categorie = $pdoStatement->fetchObject(self::class);

        return $categorie;
    }

    public function insert()
    {
        // Recuperation connexion BDD
        $pdo = Database::getPDO();

        // Préparation de la requete SQL
        $sql = "INSERT INTO categorie(id_categorie,
                                    nom_categorie,
                                    description_categorie,
                                    image_categorie) 
        VALUES( :idCategorie
                :nomCategorie
                :descriptionCategorie
                :imageCategorie)";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        // On execute la requete en laissant PDO nettoyer les données
        // Pour eviter les injections SQL
        $query->execute([
            ':idCategorie' => $this->id_categorie,
            ':nomCategorie' => $this->nom_categorie,
            ':descriptionCategorie' => $this->description_categorie,
            ':imageCategorie' => $this->image_categorie,
        ]);

        // Si l'insertion a ajouté au moins une ligne
        if($query->rowCount() > 0) {
            // On recupere l'ID de notre nouvelle categorie
            $this->id = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public function update()
    {
        // Recuperation connexion BDD
        $pdo = Database::getPDO();

        // Préparation de la requete SQL
        $sql = "
            UPDATE `categorie`
            SET
                id_categorie = :idCategorie,
                nom_categorie = :nomCategorie,
                description_categorie = :descriptionCategorie,
                image_categorie = :imageCategorie
            WHERE id = :id
        ";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        // On execute la requete en laissant PDO nettoyer les données
        // Pour eviter les injections SQL
        $query->execute([

            ':idCategorie' => $this->id_categorie,
            ':nomCategorie' => $this->nom_categorie,
            ':descriptionCategorie' => $this->description_categorie,
            ':imageCategorie' => $this->image_categorie,
        ]);

        // Si l'insertion a ajouté au moins une ligne
        if($query->rowCount() > 0) {
            // On recupere l'ID de notre nouveau produit
            $this->id = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public function delete()
    {
        // Recuperation connexion BDD
        $pdo = Database::getPDO();

        // Préparation de la requete SQL
        $sql = "
            DELETE FROM `categorie`
            WHERE id_categorie = :idCategorie
        ";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        $query->execute([
            ':idCategorie' => $this->id_categorie
        ]);
        return true;
        
    }

    /**
     * Get the value of idCategorie
     */ 
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * Get the value of nomCategorie
     */ 
    public function getNomCategorie()
    {
        return $this->nom_categorie;
    }

    /**
     * Set the value of nomCategorie
     *
     * @return  self
     */ 
    public function setNomCategorie($nom_categorie)
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    /**
     * Get the value of descriptionCategorie
     */ 
    public function getDescriptionCategorie()
    {
        return $this->description_categorie;
    }

    /**
     * Set the value of descriptionCategorie
     *
     * @return  self
     */ 
    public function setDescriptionCategorie($description_categorie)
    {
        $this->description_categorie = $description_categorie;

        return $this;
    }

    /**
     * Get the value of imageCategorie
     */ 
    public function getImageCategorie()
    {
        return $this->image_categorie;
    }

    /**
     * Set the value of imageCategorie
     *
     * @return  self
     */ 
    public function setImageCategorie($image_categorie)
    {
        $this->image_categorie = $image_categorie;

        return $this;
    }
}
