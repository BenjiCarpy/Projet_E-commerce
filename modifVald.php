<?php
session_start();
require_once("connexionDB.php");

$cnx1 = new Connexiondb();

$cnx1->executeRequete(" UPDATE utilisateur SET identifiant_utilisateur='" .$_GET["pseudo"]."', 
                        nom_utilisateur='".$_GET["nom"]."',
                        prenom_utilisateur='".$_GET["prenom"]."', 
                        tel_utilisateur='".$_GET["tel"]."',
                        mail_utilisateur='".$_GET["email"]."',
                        ville='".$_GET["ville"]."',
                        pays='".$_GET["pays"]."' , code_postal='".$_GET["code_pos"]."'
                        where id ='" .$_SESSION['connectedUser']['id']."';");

                        header('Location: cnxProfile.php')
?>

