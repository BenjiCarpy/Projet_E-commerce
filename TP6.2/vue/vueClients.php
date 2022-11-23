<?php
    require_once("modele/client.php");
    $titre = "ailTECH Lister";
    $clients = $this->modeleClient->getClients();
    $contenu = "<div>";
    $contenu .= "<h2>Liste de clients</h2>";
    $contenu .="<a title='Ajouter' href='?action=ajouter&val=''>Ajouter&#43</a>";

    $contenu .= "<article>";
    $contenu .= "<table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Courriel</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($clients as $cle => $ligne)
    {
        $client = new Client($ligne);
        $contenu .="<td>".$client->getId()."</td>";
        $contenu .="<td>".$client->getNom()."</td>";
        $contenu .="<td>".$client->getEmail()."</td>";
        $contenu .="<td>".$client->getTelephone()."</td>";
        $contenu .="<td>
                        <a title='Détails' href='?action=editer&val=".$client->getId()."'>&#128260</a>
                        | 
                        <a title='Supprimer' href='?action=supprimer&val=".$client->getId()."'>&#128465;</a>
                        | 
                        <a title='Modifier' href='?action=modifier&val=".$client->getId()."'>&#128271;</a>
                    </td></tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .= "</article>";
    $contenu .= "</div>";
    include "template.php";
?>


