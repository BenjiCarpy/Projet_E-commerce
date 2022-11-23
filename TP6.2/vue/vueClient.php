<?php
    $titre = "ailTECH Editer";
    $element = $this->modeleClient->getClient($_GET['val']);
    $client = new Client($element);
    $contenu = "<div class='content'>";
    $contenu .= "<h2> Fiche Client :</h2>";
    $contenu .= "<article >
                    <!-- Nom du client -->
                    <h3>".$client->getNom()."</h3>";

    $contenu .= "<strong>Id : </strong>" .       $client->getId()    . " <br> ";
    $contenu .= "<strong>Nom : </strong>" .      $client->getNom()  . " <br> "; 
    $contenu .= "<strong>Courriel : </strong>" . $client->getEmail() . " <br> ";
    $contenu .= "<strong>Téléphone :</strong>" . $client->getTelephone() . " <br> ";
    $contenu .= "</article>";
    include "template.php";
?>
