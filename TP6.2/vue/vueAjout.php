<?php

 // rien ne s'affiche verivie dans la page vuClient.php
    //Supprime les guetteur 
    $titre = "ailTECH Editer";
    $contenu .= "<h2> Fiche Client :</h2>";
    $contenu .= "<form name='form' method='POST' action='vueAjout.php'>";
    $contenu .= "<label for='nom'>Nom: </label>";
    $contenu .= "<input type='text' id='nom' name='nom' ><br>";
    $contenu .= "<label for='email'>Courriel: </label>";
    $contenu .= "<input type='text' id='email' name='email'><br>";
    $contenu .= "<label for='telephone'>Telephone: </label>";
    $contenu .= "<input type='text' id='telephone' name='telephone'><br>";
    $contenu .= "<input type='hidden' name='id'>";
    $contenu .= "<input type='submit' name='ajouter' value='Ajouter'>"; 
    $contenu .= " </form>";

    include "template.php";
?>



