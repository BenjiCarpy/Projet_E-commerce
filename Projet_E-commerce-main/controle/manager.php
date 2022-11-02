<?php 

    require_once('connexionDB.php');

    function ajouter($image, $nom, $prix, $desc){

        if (require('connexion.php')) {
            $rqt = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES ($image, $nom, $prix, $desc)");
            
            $rqt->execute(array($image, $nom, $prix, $desc));

            $rqt->closeCursor();
        }
    }

    function supprimer($id){

        // Supprime les données d'un client déterminé par son id
        $rqt = $access->prepare("DELETE FROM produits WHERE id= ? ;");
        $rqt->execute(array($id));
        $client = $rqt->fetch();
        $rqt->closeCursor();    // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
        return $client;
    }



    function afficher(){
            $rqt = $access->prepare("SELECT * FROM produit ORDER BY prix DESC;");;
            $rqt->execute();
            $res = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor();
            return $res;
            
        
    }
    

?>    