<?php
    require_once("modele/modele.php");
    /* Accès à la table client de la base de données *************************/
    class modeleClient extends Database {

        // Colonne
        public $id;
        public $name;
        public $email;
        public $phone;

        // Connexion à la base de données
        public function __construct()
        {
            parent::__construct();
        }

        // Extraction des données des clients depuis la base de données.
        public function getClients()
        {
            $sql = "SELECT * FROM client;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $clients = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête
            return $clients;
        }

        // Récupère les données d'un client déterminé par son id
        public function getClient($id)
        {
            $sql = "SELECT * FROM client WHERE id = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $client = $rqt->fetch();
            $rqt->closeCursor();    // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            return $client;
        }

        public function deleteClient($id)
        {
            // Supprime les données d'un client déterminé par son id
            $sql = "DELETE FROM client WHERE id= ? ;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $client = $rqt->fetch();
            $rqt->closeCursor();    // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
            return $client;
        }

        public function addClient($id, $nom, $telephone, $email)
        {
            // Ajoute un client
            $sql = "INSERT INTO client(nom, telephone, email, adress) VALUES( ?, ?, ?, '')";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($sql);
            $rqt->closeCursor();
        }

        public function updateClient($id, $nom, $telephone, $email)
        {
            // Modifie un client
            $sql = "UPDATE client SET nom= ?, telephone= ?, email= ?, adress= ? WHERE id= ? ";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $client = $rqt->fetch();
            $rqt->closeCursor();
            return $client;
        }
    }
?>
