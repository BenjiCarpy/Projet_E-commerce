<?php
require_once("connexionDB.php");
$cnx = new Connexiondb();
try{
    $cnx = new PDO("mysql:host=localhost;dbname=wallidb", "btssio", "btssio");
    // Set the PDO error mode to exception
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
try{
  

    // Create prepared statement
    $sql = "UPDATE produit SET nom_prod=':nom_prod', image=':image', id_categorie_prod=':id_categorie_prod', prix=':prix', stock=':stock', description_produit=':description_produit' WHERE id='$id';";
    $stmt = $cnx->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':nom_prod', $_REQUEST['nom_prod']);
    $stmt->bindParam(':image', $_REQUEST['image']);
    $stmt->bindParam(':id_categorie_prod', $_REQUEST['id_categorie_prod']);
    $stmt->bindParam(':prix', $_REQUEST['prix']);
    $stmt->bindParam(':stock', $_REQUEST['stock']);
    $stmt->bindParam(':description_produit', $_REQUEST['description_produit']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records update successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>

<button type="" name="retour" class="btn btn-primary"><a href="vueProduit.php">Retour</a></button>