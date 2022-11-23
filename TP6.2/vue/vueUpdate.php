<?php

    // rien ne s'affiche verivie dans la page vuClient.php

    $titre = "ailTECH Editer";
    $element = $this->modeleClient->getClient($_GET['val']);
    $client = new Client($element);
    $contenu = "<div class='content'>";
    $contenu .= "<h2> Fiche Modifier client :</h2>";

    $contenu .= "<article >
                    <!-- Nom du client -->
                    <h3>".$client->getNom()."</h3>";

    $contenu .= "<strong>Id : </strong>" .       $client->getId()    . " <br> ";
    $contenu .= "<strong>Nom : </strong>" .      $client->getNom()  . " <br> "; 
    $contenu .= "<strong>Courriel : </strong>" . $client->getEmail() . " <br> ";
    $contenu .= "<strong>Téléphone :</strong>" . $client->getTelephone() . " <br> ";
    $contenu .= "</article>";


    $contenu .= "<form name='form' method='POST' action='modifier.php'>";
    $contenu .= "<label for='nom'>Nom: </label>";
    $contenu .= "<input type='text' id='nom' name='nom' value='".       $client->getNom()    ."'><br>";
    $contenu .= "<label for='email'>Courriel: </label>";
    $contenu .= "<input type='text' id='email' name='email' value='".       $client->getEmail()    ."'><br>";
    $contenu .= "<label for='telephone'>Telephone: </label>";
    $contenu .= "<input type='text' id='telephone' name='telephone' value='" .       $client->getTelephone()    ."'><br>";
    $contenu .= "<input type='hidden' name='id' value='". $element ."'>";
    $contenu .= "<input type='submit' name='update' value='Modifier'>"; 
    $contenu .= " </form>";
    $contenu .= " </div>";
    include "template.php";
    echo $element;
    var_dump($element);

    if (isset($_REQUEST['update'])) {
         
    }
?>
