<?php

namespace App\Model;

use App\Utils\Database;

/**
 * Child class of Manager, helps manage orders
 */

 class Order
 {
     
    private $id;
    private $prix_total;
    private $date;

    /**
     * Collect every orders according to the flag.
     *
     * @return array
     */
    public static function findAll() : array
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM commande ORDER BY id';
      
        $pdoStatement = $pdo->query($sql);

        $order = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);

        return $order;
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
            FROM commande
            WHERE id = ?';
        
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute(array($id));

        $order = $pdoStatement->fetchObject(self::class);

        return $order;
    }

    public function insert()
    {
        // Recuperation connexion BDD
        $pdo = Database::getPDO();

        // Préparation de la requete SQL
        $sql = "INSERT INTO commande(   id,
                                        prix_total,
                                        date_commande) 
        VALUES( :id,
                :prixTotal,
                :dateCommande)";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        // On execute la requete en laissant PDO nettoyer les données
        // Pour eviter les injections SQL
        $query->execute([

            ':id' => $this->id,
            ':prixTotal' => $this->prix_total,
            ':date_commande' => $this->date_commande
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
            UPDATE `commande`
            SET
                id,
                prix_total,
                date_commande
            WHERE id = :id
        ";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        // On execute la requete en laissant PDO nettoyer les données
        // Pour eviter les injections SQL
        $query->execute([

            ':id' => $this->id,
            ':prixTotal' => $this->prix_total,
            ':date_commande' => $this->date_commande
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
            DELETE FROM `commande`
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
     * Get the value of prixTotal
     */ 
    public function getPrixTotal()
    {
        return $this->prix_total;
    }

    /**
     * Set the value of prixTotal
     *
     * @return  self
     */ 
    public function setPrixTotal($prix_total)
    {
        $this->prix_total = $prix_total;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
 }
 