<?php
    require_once("modele/produit.php");
    $titre = "ailTECH Lister";
    $produits = $this->modeleProduit->getproduits();
    $contenu = "<div>";
    $contenu .= "<h2>Liste des produits</h2>";
    $contenu .="<a title='Ajouter' href='?action=ajouter&val=''>Ajouter&#43</a>";

    $contenu .= "<article>";
    $contenu .= "<table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Categorie</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Decription</th>
                    </tr>
                </thead>
                <tbody>"; 

    foreach ($produit as $cle => $ligne)
    {
        $produit = new produit($ligne);
        $contenu .="<td>".$produit->getId()."</td>";
        $contenu .="<td>".$produit->getImage()."</td>";
        $contenu .="<td>".$produit->getNomProd()."</td>";
        $contenu .="<td>".$produit->getIdCategorie()."</td>";
        $contenu .="<td>".$produit->getPrix()."</td>";
        $contenu .="<td>".$produit->getStock()."</td>";
        $contenu .="<td>".$produit->getDescriptionProd()."</td>";
        $contenu .="<td>
                        <a title='Détails' href='?action=editer&val=".$produit->getId()."'>&#128260</a>
                        | 
                        <a title='Supprimer' href='?action=supprimer&val=".$produit->getId()."'>&#128465;</a>
                        | 
                        <a title='Modifier' href='?action=modifier&val=".$produit->getId()."'>&#128271;</a>
                    </td></tr>";
    }
    $contenu .="</tbody></table>";
    $contenu .= "</article>";
    $contenu .= "</div>";
    include "template.php";
?>


