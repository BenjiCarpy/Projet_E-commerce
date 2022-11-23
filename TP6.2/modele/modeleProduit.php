<?php
    require_once("modele/modele.php");
    /* Accès à la table client de la base de données *************************/
    class modeleProduit extends Database {

        // Colonne
        public $id;
        public $id_categorie_prod;
        public $nom_prod;
        public $description_produit;
        public $prix;
        public $stock;
        public $image;

        // Connexion à la base de données
        public function __construct()
        {
            parent::__construct();
        }

        // Extraction des données des clients depuis la base de données.
        public function getProduits()
        {   
            $sql = "SELECT * FROM produit;";
            $rqt = $cnx->prepare($sql);
            $rqt->execute();
            $produits = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête
            return $produits;
        }

        // Récupère les données d'un client déterminé par son id
        public function getProduit($id)
        {   
            $sql = "SELECT * FROM produit WHERE id = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $produit = $rqt->fetch();
            $rqt->closeCursor();    // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            return $produit;
        }

        public function deleteProduit($id)
        {
            // Supprime les données d'un produit déterminé par son id
            $sql = "DELETE FROM produit WHERE id= ? ;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $users = $rqt->fetch();
            $rqt->closeCursor();    // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            return $produit;
        }

        public function addProduit($id, $id_categorie_prod, $nom_prod, $description_produit, $prix, $stock, $image)
        {
            // Ajoute un produit
            $sql = "INSERT INTO produit(id_categorie_prod, nom_prod, description_produit, prix, stock, image) VALUES( ?, ?, ?, ?, ?, ?)";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($sql);
            $rqt->closeCursor();
        }

        public function updateProduit($id, $id_categorie_prod, $nom_prod, $description_produit, $prix, $stock, $image)
        {
            // Modifie un produit
            $sql = "UPDATE produit SET id_categorie_prod= ?, nom_prod= ?, description_produit= ?, prix= ?, stock= ?WHERE id= ? ";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $users = $rqt->fetch();
            $rqt->closeCursor();
            return $produit;
        }
    }
?>
