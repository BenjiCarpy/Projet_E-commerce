<?php 
  /**
   * @author 
   * @copyright Copyright (c) 2002, 
   * @version 1.0
   */

  require('connexionDB.php'); 
  //recuperer l'id
  $id = $_GET['id'];
   
  //Affichez le produit par rapport à l'id
  $sql1 = "SELECT * FROM produit WHERE id=$id;";
  $resultat = $cnx->getRequete($sql1);
  $line = $resultat->fetch();
  $nom_prod = $_GET;
  var_dump($nom_prod);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <link rel="icon" href="media\icon\icon.ico" >
    <title>Admin</title>


    <link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pushster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/carousel.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d0217dd888.js" crossorigin="anonymous"></script>

    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;

      
      }


      /* Scrollbar */

      ::-webkit-scrollbar {

      width: 8px;

      }

      ::-webkit-scrollbar-track {

      border-radius: 10px;

      }

      ::-webkit-scrollbar-thumb {

      border-radius: 10px;
      background-color: gray;

      }

      ::-webkit-scrollbar-thumb:hover {

      background-color:black;

      }


      .imgProd{
        width: 100%;
        height:225px;
        object-fit: contain;

      }

      .mb-4 {
        margin-bottom: 1rem!important; 
      }

      .py-5 {
        padding-top: 3.5rem!important; 
        padding-bottom: 3rem!important;
      }

      .py-4 {
        padding-top: 1.5rem!important;
        padding-bottom: 0rem!important; 
      }

      .my-4 {
        margin-top: 1.5rem!important;
        margin-bottom: 0rem!important; 
      }
      button, a{
        text-decoration: none;
      }

      .fs-4{
        font-family: 'Pushster', cursive;
        font-weight: 700;
        font-size: 16px;
      }

      .btns{
        background: transparent;
        border: none;
        outline: none;
        color: grey;
      }

      .btns i:hover{
        cursor: pointer;
      }

      .form-select:hover{
        text-decoration: underline;
      }

    </style>

    
  </head>

  


<body>
  <header>
    <!-- En-tête  -->
      <div class="container">
          <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <img src="media\icon\icon.ico" alt="logo" width="50px" height="50px">
              <span class="fs-4">Wall-it</span>
          </a>

          <ul class="nav nav-pills">
              <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
              <li class="nav-item"><a href="panier.php" class="nav-link">Panier</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Favoris</a></li>
              <li class="nav-item"><a href="formulaire.php" class="nav-link">Compte</a></li>
          </ul>
          </header>
      </div>
  </header>

  <div class="album py-5 bg-light">
      <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <form method="$_POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom du produit</label>
                    <input type="name" class="form-control" name="nom_prod" id="nom_prod" value="<?= $line['nom_prod'] ?>" >
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input type="text" class="form-control" name="image" id="image"value="<?= $line['image'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Categorie</label>
                    <input type="number" min="0" max="9" class="form-control" name="id_categorie_prod" id="id_categorie_prod" value="<?= $line['id_categorie_prod'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Prix</label>
                    <input type="number" step="0.01" min="0" class="form-control" name="prix" id="prix" value="<?= $line['prix'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Stock</label>
                    <input type="number" min="0" class="form-control" name="stock" id="stock" value="<?= $line['stock'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <textarea class="form-control" name="description_produit" id="description_produit" ><?= $line['description_produit'] ?></textarea>
                </div>

                <button type="submit" name="valider" class="btn btn-primary"> <a href="verifUpdateProduit.php"> Modifier</a></button>
                <button type="" name="retour" class="btn btn-primary"><a href="vueProduit.php">Retour</a></button>
            </form>

          </div>
      </div>
  </div>

</body>
</html>

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
        // Vérifier si le formulaire est soumis 
        if ( isset( $_GET['submit'] ) ) {
          /* récupérer les données du formulaire en utilisant 
            la valeur des attributs name comme clé 
            */
          $nom_prod = $_POST['nom_prod']; 
          echo 'Nom : ' . $nom_prod; 
          exit;
          }


        // Create prepared statement
        $sql = "UPDATE produit SET nom_prod=:nom_prod, image=:image, id_categorie_prod=:id_categorie_prod, prix=:prix, stock=:stock, description_produit=:description_produit WHERE id='$id';";
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