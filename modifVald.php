<?php
session_start();
require_once("connexionDB.php");

$cnx1 = new Connexiondb();

$cnx1->executeRequete("UPDATE utilisateur SET identifiant_utilisateur='" .$_GET["pseudo"] . "', nom_utilisateur='" . $_GET["nom"]."', prenom_utilisateur='" . $_GET["prenom"]."', tel_utilisateur='".$_GET["tel"]."' , mail_utilisateur='".$_GET["email"]."' where id ='" .$_SESSION['connectedUser']['id']."';");



?>

<br>
<a href="index.php"><img src="media\icon\left-arrow-svgrepo-com.svg" alt="Accueil" width="40px" height="40px"></a>