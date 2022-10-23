<?php
    require_once("connexionDB.php");
    /* Accès à la table client de la base de données */
    class modeleProduit extends Connexiondb {

        // Colonne
        public $id;
        public $id_categorie_prod;
        public $nom_prod;
        public $description_prod;
        public $prix;
        public $stock;
        public $image;

        // Connexion à la base de données
        public function __construct()
        {
            parent::__construct();
        }

        // Extraction des données des clients depuis la base de données.
        public function getProduit()
        {
            $sql = "SELECT * FROM produit;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $produits = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête
            return $produits;
        }

        // Récupère les données d'un produit déterminé par son id
        public function getIdProduit($id)
        {
            $sql = "SELECT * FROM produit WHERE id = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $produit = $rqt->fetch();
            $rqt->closeCursor();    // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            return $produit;
        }

        public function deleteClient($id)
        {
            // Supprime les données d'un client déterminé par son id
            $sql = "DELETE FROM client WHERE id= ? ;";
            
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $produit = $rqt->fetch();
            $rqt->closeCursor();    // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            return $produit;
        }

        public function addClient($nom_prod, $image, $id_categorie_prod, $prix, $stock, $description_produit)
        {
            // Ajoute un client
            $sql = "INSERT INTO produit(nom_prod, image, id_categorie_prod, prix, stock, description_produit) VALUES(?, ?, ?, ?, ?, ?)";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($sql);
            $rqt->closeCursor();
        }

        public function updateClient($id, $nom_prod, $image, $id_categorie_prod, $prix, $stock, $description_produit)
        {
            // Modifie un client
            $sql = "UPDATE client SET nom_prod= ?, image= ?, id_categorie_prod= ?, prix= ?, stock= ?, description_produit= ? WHERE id= ? ";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $produit = $rqt->fetch();
            $rqt->closeCursor();
            return $produit;
        }
    }
?>
