<?php
// Connexion à la base de données
include_once("connexionDB.php");

$email = $_POST['email'];
$pswd = $_POST['pswd'];


// Récupération de l'utilisateur lié à l'adresse mail
$rqt = "SELECT * FROM utilisateur WHERE mail_utilisateur = ?" ;

$cnx = new Connexiondb();

$results = $cnx->executeRequete($rqt , [$email]);

// Si l'utilisateur existe
if (!empty($results)) {
    // Si le mot de passe de l'utilisateur correspond à celui envoyé
    if ($pswd === $results['mdp_utilisateur']){
        // On démarre une session
        session_start();
        // On enregistre les informations de l'utilisateur
        $_SESSION["connectedUser"] = $results;
        //On vérifie si l'utilisateur est un administrateur ou pas
        if ($_SESSION["connectedUser"]["administrateur"] == "oui"){
            header('Location: profileAdmin.php');
            exit;
        }else{
            header('Location: profileUser.php');
            exit;
        }
    } else {
        // Sinon si les mots de passe sont différents (le mdp est erroné) => On renvoi une erreur
        echo "Email ou mot de passe erroné";
    }
    
} else {
    // Sinon si l'utilisateur n'existe pas (l'email n'existe pas) => On renvoi une erreur
    echo "Email ou mot de passe erroné";
}