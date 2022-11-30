<?php

namespace App\Model;

use App\Utils\Database;

/**
 * Child class of Manager, helps manage products
 */
class Product
{

    private $id;
    private $id_categorie_prod;
    private $id_commande_prod;
    private $nom_prod;
    private $description_produit;
    private $prix;
    private $stock;
    private $image;

    /**
     * Collect every products according to the flag.
     *
     * @return array
     */
    public static function findAll() : array
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM produit ORDER BY nom_prod';
      
        $pdoStatement = $pdo->query($sql);

        $productList = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);

        return $productList;
    }

    /**
     * Collect details from one product
     *
     * @param int $id
     * @return Product
     */
    public static function find(int $id) : Product
    {
        $pdo = Database::getPDO();

        $sql = '
            SELECT *
            FROM produit
            WHERE id = ?';
        
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute(array($id));

        $product = $pdoStatement->fetchObject(self::class);

        return $product;
    }

    public function insert()
    {
        // Recuperation connexion BDD
        $pdo = Database::getPDO();

        // Préparation de la requete SQL
        $sql = "INSERT INTO produit(nom_prod,
                                    image,
                                    id_categorie_prod,
                                    id_commande_prod,
                                    prix,
                                    stock,
                                    nom_prod,
                                    description_produit) 
        VALUES( :nomProd,
                :image,
                :idCommandeProd,
                :idCategorieProd,
                :prix,
                :stock,
                :nomProddescriptionProduit)";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        // On execute la requete en laissant PDO nettoyer les données
        // Pour eviter les injections SQL
        $query->execute([
            ':nomProd' => $this->nom_prod,
            ':image' => $this->image,
            ':idCommandeProd' => $this->id_commande_prod,
            ':idCategorieProd' => $this->id_categorie_prod,
            ':prix' => $this->prix,
            ':stock' => $this->stock,
            ':nomProd' => $this->nom_prod,
            ':descriptionProduit' => $this->description_produit
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
            UPDATE `produit`
            SET
                nom_prod = :nomProd,
                image = :image,
                id_categorie_prod = :idCategorieProd,
                prix = :prix,
                stock = :stock,
                nom_prod = :nomProd,
                description_produit = :descriptionProduit
            WHERE id = :id
        ";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        // On execute la requete en laissant PDO nettoyer les données
        // Pour eviter les injections SQL
        $query->execute([

            ':nomProd' => $this->nom_prod,
            ':image' => $this->image,
            ':idCategorieProd' => $this->id_categorie_prod,
            ':prix' => $this->prix,
            ':stock' => $this->stock,
            ':nomProd' => $this->nom_prod,
            ':descriptionProduit' => $this->description_produit,
            ':id' => $this->id
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
            DELETE FROM `produit`
            WHERE id = :id
        ";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        $query->execute([
            ':id' => $this->id
        ]);
        return true;
        
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of idCategorieProd
     */ 
    public function getIdCategorieProd()
    {
        return $this->id_categorie_prod;
    }

    /**
     * Set the value of idCategorieProd
     *
     * @return  self
     */ 
    public function setIdCategorieProd($id_categorie_prod)
    {
        $this->id_categorie_prod = $id_categorie_prod;

        return $this;
    }

    /**
     * Get the value of idCommandeProd
     */ 
    public function getIdCommandeProd()
    {
        return $this->id_commande_prod;
    }

    /**
     * Set the value of idCommandeProd
     *
     * @return  self
     */ 
    public function setIdCommandeProd($id_commande_prod)
    {
        $this->id_commande_prod = $id_commande_prod;

        return $this;
    }

    /**
     * Get the value of nomProd
     */ 
    public function getNomProd()
    {
        return $this->nom_prod;
    }

    /**
     * Set the value of nomProd
     *
     * @return  self
     */ 
    public function setNomProd($nom_prod)
    {
        $this->nom_prod = $nom_prod;

        return $this;
    }

    /**
     * Get the value of nomProddescriptionProduit
     */ 
    public function getDescriptionProduit()
    {
        return $this->description_produit;
    }

    /**
     * Set the value of nomProddescriptionProduit
     *
     * @return  self
     */ 
    public function setnomProddescriptionProduit($description_produit)
    {
        $this->description_produit = $description_produit;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
