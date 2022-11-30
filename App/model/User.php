<?php

namespace App\Model;

use App\Utils\Database;

/**
 * Child class of Manager, helps manage users
 */

 class User
 {
    private $id;
    private $id_commande;
    private $identifiant_utilisateur;
    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $mail_utilisateur;
    private $tel_utilisateur;
    private $mdp_utilisateur; 
    private $admin;

    public static function findAll() : array
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM utilisateur ORDER BY id';
      
        $pdoStatement = $pdo->query($sql);

        $userList = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);

        return $userList;
    }

    public static function find(int $id) : User
    {
        $pdo = Database::getPDO();

        $sql = '
            SELECT *
            FROM utilisateur
            WHERE id = ?';
        
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute(array($id));

        $user = $pdoStatement->fetchObject(self::class);

        return $user;
    }


    public function findByEmail(string $email)
    {
        
        $pdo = Database::getPDO();
        
        $sql = 'SELECT * FROM utilisateur WHERE mail_utilisateur = :mail';
        
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute(array($email));

        $user = $pdoStatement->fetchObject(self::class);

        return $user;

    }

    public function insert()
    {
        // Recuperation connexion BDD
        $pdo = Database::getPDO();

        // Préparation de la requete SQL
        $sql = "INSERT INTO utilisateur(
                            id,
                            id_commande,
                            identifiant_utilisateur,
                            nom_utilisateur,
                            prenom_utilisateur,
                            mail_utilisateur,
                            tel_utilisateur,
                            mdp_utilisateur,
                            admin) 
        VALUES( :id,
                :idCommande,
                :identifiant,
                :nom,
                :prenom,
                :email,
                :tel,
                :pass,
                :admin)";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        // On execute la requete en laissant PDO nettoyer les données
        // Pour eviter les injections SQL
        $query->execute([
            ':id' => $this->id,
            ':idCommande' => $this->id_commande,
            ':identifiant' => $this->identifiant_utilisateur,
            ':nom' => $this->nom_utilisateur,
            ':prenom' => $this->prenom_utilisateur,
            ':email' => $this->mail_utilisateur,
            ':tel' => $this->mdp_utilisateur,
            ':admin' => $this->admin
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
            UPDATE `utilisateur`
            SET
                id_commande = :idCommande,
                identifiant_utilisateur = :identifiant,
                nom_utilisateur = :nom,
                prenom_utilisateur = :prenom,
                mail_utilisateur = :email,
                tel_utilisateur = :tel,
                mdp_utilisateur = :pass,
                admin = :admin
            WHERE id = :id
        ";

        // On indique à PDO qu'on va vouloir securiser la requete
        $query = $pdo->prepare($sql);

        // On execute la requete en laissant PDO nettoyer les données
        // Pour eviter les injections SQL
        $query->execute([

            ':idCommande' => $this->id_commande,
            ':identifiant_utilisateur' => $this->identifiant_utilisateur,
            ':nom' => $this->nom_utilisateur,
            ':prenom' => $this->prenom_utilisateur,
            ':email' => $this->mail_utilisateur,
            ':tel' => $this->tel_utilisateur,
            ':pass' => $this->mdp_utilisateur,
            ':admin'=> $this->admin
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
            DELETE FROM `utilisateur`
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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->mail_utilisateur;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($mail_utilisateur)
    {
        $this->mail_utilisateur = $mail_utilisateur;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->mdp_utilisateur;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($mdp_utilisateur)
    {
        $this->mdp_utilisateur = $mdp_utilisateur;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel_utilisateur;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel_utilisateur)
    {
        $this->tel_utilisateur = $tel_utilisateur;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of idCommande
     */ 
    public function getidCommande()
    {
        return $this->id_commande;
    }

    /**
     * Set the value of idCommande
     *
     * @return  self
     */ 
    public function setidCommande($id_commande)
    {
        $this->id_commande = $id_commande;

        return $this;
    }

    /**
     * Get the value of identifiant
     */ 
    public function getIdentifiant()
    {
        return $this->identifiant_utilisateur;
    }

    /**
     * Set the value of identifiant
     *
     * @return  self
     */ 
    public function setIdentifiant($identifiant_utilisateur)
    {
        $this->identifiant_utilisateur = $identifiant_utilisateur;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom_utilisateur;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom_utilisateur)
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom_utilisateur;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom_utilisateur)
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    /**
     * Get the value of admin
     */ 
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */ 
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }
 }
 