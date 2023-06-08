<?php
require('connexionDB.php');

$id = $_GET['id'];
var_dump($id);
$sql = "DELETE FROM produit WHERE id='" . $_GET['id'] . "'";


try {
    $cnx = new PDO("mysql:host=mysql-wall-it.alwaysdata.net;dbname=wall-it_wallidb", "wall-it", "btssio2");
        // Set the PDO error mode to exception
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     /*sql to delete a record*/
     $sql = "DELETE FROM produit WHERE id='" . $_GET['id'] . "'";

    /*use exec() because no results are returned*/
    $cnx->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$cnx = null;
header('Location:vueProduit.php');
exit;

?>