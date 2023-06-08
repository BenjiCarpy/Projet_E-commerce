
<style>
.panier {
    display: flex;
    align-items:center;
    justify-content:center;
    min-height: 100vh;
}

.panier img {
    width: 40px;
    padding: 8px 0;
}



.panier section {
    width: 70%;
    background-color: #F2F3F4 ;
    padding: 10px;
    border-radius: 7px;
    letter-spacing: 1px;
   
}

table {
    border-collapse: collapse;
    width: 100%;
    letter-spacing: 2px;
    font-size: 13px;
    
}

th {
    padding: 10px;
    font-weight: 400;
}
td {
    border-top: 1px solid #9999; 
    text-align: center;
    color: #37a6ff;
}

tr{
    border-bottom: 1px solid #9999;
}
.total th {
    border: 0;
    float: left;
    font-weight:500;
    color: #37a6ff;
    padding: 10px;
}

</style>

<?php 
   session_start();
   include_once "connexionDB.php";

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body class="panier">
    <a href="catalogue.php" class="link">Retour au catalogue</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>

            <?php 
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                //si oui 
                
                $sql1 = "SELECT * FROM produit WHERE id IN (".implode(',', $ids).");"; 
                $rqt = $cnx->getRequete($sql1);
                $products = $rqt->fetchAll(PDO::FETCH_ASSOC);

                //lise des produit avec une boucle foreach
                foreach($products as $product):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['prix'] * $_SESSION['panier'][$product['id']] ;
                ?>


                <tr>
                    <td><img src="<?=$product['image']?>"></td>
                    <td><?=$product['nom_prod']?></td>
                    <td><?=$product['prix']?>€</td>
                    <td><?=$_SESSION['panier'][$product['id']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$product['id']?>"><img src="delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>
            
            <tr class="total">
                <th>Total : <?=$total?>€</th>
            </tr>
        </table>
    </section>
</body>
</html>