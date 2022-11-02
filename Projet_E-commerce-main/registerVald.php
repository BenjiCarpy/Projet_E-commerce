<?php
/**
 * @author Benjamin Carpy
 * @copyright Copyright (c) 2002, Benjamin Carpy 
 * @version 1.0
 */

/**
 * Valid.php permet la validation de l'envoie de la requete à la base de donnée
 */

/**
 * Permet de relier dbConnexion_cor.php à valid.php
 */
include_once("connexionDB.php");


/**
 * @param $cnx = new Connexiondb(), permet d'appeler la classe Connexiondb
 * 
 * Envoie une requete à la fonction getRequete
 * 
 * Envoie les données du le nom, le numéro de téléphone, l'email et l'adresse à la base de donnée
 */
$cnx = new Connexiondb();

$id=$_POST["id"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$tel=$_POST["tel"];
$mail=$_POST["mail"];
$pass=$_POST["pass"];


$resultat=$cnx->getRequete("Insert into utilisateur(identifiant_utilisateur , nom_utilisateur , prenom_utilisateur, tel_utilisateur , mail_utilisateur ,  mdp_utilisateur) 
                            Values('$id','$nom','$prenom' ,'$tel' , '$mail','$pass' ) ;");

/**
 * Si @param $resultat renvoie false, il afficheras une erreur
 * Sinon il retourne à l'index
 */
header('Location: index.php');
?>
<br>
<a  target="CONTENTS" href="index.php">Retour au menu</a>