<?php 
/**
 * @author 
 * @copyright Copyright (c) 2002, 
 * @version 1.0
 */

require('connexionDB.php'); 
$sql1 = "SELECT * FROM produit ORDER BY prix DESC;";
$rqt = $cnx->getRequete($sql1);
$res = $rqt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($res); 


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
    <title>Catalogue</title>


    <link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pushster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
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

    </style>

    
  </head>
  <body>
    
<header>
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

<main>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($res as $line): ?>
            <div class="col">
            <div class="card shadow-sm">
                  <title><?= $line['nom_prod'] ?></title>
                  <img class="imgProd" src="<?= $line['image'] ?>">

                <div class="card-body">
                <div class="title"><h6><?= $line['nom_prod'] ?></h6></div>
                <br>
                
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="addPanier.php?id=<?= $line['id'] ?>">Acheter</a></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="addPanier.php?id=<?= $line['id'] ?>">Voir</a></button>
                    </div>                    
                    <small class="text-muted"><?= $line['prix'] ?>€</small>
                    <button onclick="Toggle1()" id="btnh1" class="btns"><i class="fa-solid fa-heart"></i></button>
                </div>
                </div>
            </div>
            </div>
        <?php endforeach; ?>

        <script>
          var btnvar1 = document.getElementById('btnh1');
          function Toggle1(){
            if (btnvar1.style.color=="red") {
              btnvar1.style.color="grey"
              
            }
            else{
              btnvar1.style.color=="red"
            }
          }

        </script>
       


    
      </div>
    </div>
  </div>

</main>

<div class="container">
  <footer class="py-5">

    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Haut de la page</a>
      </p>
    </div>

    <div class="row">
      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>


      <div class="col-md-5 offset-md-1 mb-3">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>&copy; 2022 CHE, Inc. Tous les droits sont réservés.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
</div>




    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
