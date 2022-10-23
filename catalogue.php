<?php 
  /**
   * @author 
   * @copyright Copyright (c) 2002, 
   * @version 1.0
   */

  require('connexionDB.php'); 


    $sql1 = "SELECT * FROM produit;"; 
    $rqt = $cnx->getRequete($sql1);
    $res = $rqt->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT id_categorie, nom_categorie, description_categorie  FROM categorie;"; 
    $rqt = $cnx->getRequete($sql2);
    $res2 = $rqt->fetchAll();


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

      .form-select{
        width: 100%;
        margin-bottom: 5%;
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
            <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAXRJREFUWEftl/1NAzEMxV8ngA0KE0AnKGzACGwCbMIKTFA2gBFgA5gA9KoEGV+cODEnndDlv1P88euzz75usLCzWRgP/iXQJYBDUvoawGtE9ahCGeY0QXwACEFFgDRMFiYENQqkYT4TzUlUqRGgEsxVAnkGEILqBbJgciPzPgTVA9SCyT0UgvICeWHCUB6gXpgQVAtoFGYYqgYUhRmCsoD+CqYbqgRUmsC76I4CwLgvYs8VJ7oGstZBq9e8+/RLGU6gdKI3ANtC9LmAmIo5z3POJQC9AzizgHhxmy7vhFIanHZ7GUipyl/9BIAlkUeW7CFdPCaVjo+1UkhnaWf1ma50qWmtmD++I0BcpBfOLqZKN8J2FqCS7JrPKvfsQJbCVuIVKJduVciaY6tCVKD5plRsmr61wchJm//SOOeg2+zX/pJeNaB7AHLAubM5DLnHGH9yWp8VdOKyLX2SOPJOTKgMl2kRprVcRxKGfVoKhRP0Blgc0DeLW4ElGWlZGwAAAABJRU5ErkJggg=="/><!--Home--></a></li>
            <li class="nav-item"><a href="panier.php" class="nav-link"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAetJREFUWEftl70yBEEQx39XpaS8ATKJwhvwBHgCRDI8gCqUBzhCAh9PgFTEC/gIJUjEiAXUv2p2a3bvY7t3R7ngpurqavf+3fOb7p6euRYDNloDxsMQqCojwwh5I/RTZfAHv58D65nfcsr+A0gsOccgAD0Bc70iFGdkDTgLLx6B+YTpUppWg78jYNsCNA68AWNBLCCBpRifkd9F4NYCJE3PlTSgUnoegv0XoIXno6oPLQOXQa1oTTUAyUz3gN3wcA1oDjOQhAKZCBYrwFVDKKV9NvjQdlcWXECHwFawuABU7HWH0vMRGSviWrALKM65ilFO9F1nxDu3sN0zZ1U1lOniMCvEhVU5yBYAfTQK290LpD7RdkxskXakS0bWCE0Cr5ZZjJqu0fEASavdtRQmvIubmRFCMtWemmDPBmuNkJzFBZmqJ3WsxQNUPkoKLd8Rpb5SD5AcxUeJwq9nbwvom24vUIri3gd0fHQdXqCsltS9s1uAN1vJgQSgelKDyy9WDirtsvy6UbarEyHH3H5pE6DjcDl/ATaBmy7TWzQFs7pAujacRp6egekSkEXTqA/FxjvAQfTiGxgtebdokgHNAPfASPB4AmyUvFs0yYDkSBPqbHuP/p2UJ7BoktSQf/sYLeoWtdG9XzYEqorZL2BcVCUCR92nAAAAAElFTkSuQmCC"/><!--Panier--></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAdhJREFUWEftl+0xBTEUht9bAR3QASqgA1SAClABHaACVIAOrgpQATrQAfOYxGSy2T35+rFmbmbun83JyZP3fCR3oZmNxcx4tAKyIlKi0LakDUnrkt4kvRrOsd+S9CXpM8P+150FtCnpStLByOaPks4lfbj5UvuB2ykgIG6dIlNioMClO9xFpv2JJA6TDXQn6SiyJkxL923PhWMKFHuUI8T8CF84biSdxQ5SCqHMQ2D4LOk4CIufIjyA70ZOS+wPY6ViIE7yHsh+72CmlAjVLLVHwR2X+MmkRgnyhkFlUCnkiDW89NeWoTssFUrFMsgnDpUEItH23RzVk7NBBsPAhANQvYynsIrjkCGhJ0dKq9fUwLAG5V/cYvZgr6RC38EOVo+qhfHrknvNQSHaA4r9jxwKq2xQkq0xcutpLeQPfcysMowBWXPGlCNl2XOEfWvQWnI6dU+o+EoyO7VXgv5zGsjSAyqGyb7LPEfsoAUq9jV6xVi9pgdUNgxKWEDYtEAVweQC1UIVw5QAlUJVwZQC5UJVw9QAWVBNMLVAY1AUSPgOz3k9Dm6AnCobuzZSfwS8bRVMi0JjzZPv1TA9gOLwNcH0AsJPySN/8uXQkkM9nyR/vlZAlqyzU+gH9xZ1JW/TivIAAAAASUVORK5CYII="/><!--Favoris--></a></li>
            <li class="nav-item"><a href="cnxProfile.php" class="nav-link"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAhFJREFUWEftl/0xREEQxFsEhEAEiAARIAJEgAgQASIgA0SACBABIRAB9VO7VXN7+zXvjnqlzH9btTfTr6end25BI4uFkeHRnwK0JOlQ0qaktcD0s6QHSZeS3oewP5ShHUlXkgCVC8AcSLr1ghoC6FTSSWehM0nc7w4vIFrzZLK/hIK0iaB9AFg1d9Yl0cqu8AIicSx2J4nW5YJWbRtdAaorPICWJb2GrB+SOJeEi7beJC2G+yvh3ATlAQQbNyFjjZ1Y1LK02ytwDyAr5h6xeu9/f4gH0OgYshpCO+iipiH0Fn3qRzQEo3bK0AjaaE0Z1hCdfK6iJlnqQwBEK4+h0kY4WwA/6kPUHZVTR8oR+LXxmbQV+NR+76jbH3umLC2KYI8Kr/3Fb7/2TXEOvTCUIR5R3rTa+oHgo9i78XkA0Z49zwibxxW9sbQ1owcQhsgyBiuzBCsKSxuPbjFagJiU80xraAUtqTk1XoQv2WhukjVAMMMyZnXS86imX5/6FqAwyyxTNUBQHL8Q+4et7s0vQQVb6Cgud+TeyvWtBAgB06oYLvsvCCR9do4l4VcTUQJkH9EhbSqJ1raPGlOrbQnQp8nYEr538qq5c8UY7/tQhWmaddxTwFab6Cj+Y/m+lwNk9YOZcZ5noBv+8RJTOsoBGrQLOxBX85daFtsEnROUOgqXrpK7mH/egp0Z7z+gFoWjY+gLrcNtJQd+2ekAAAAASUVORK5CYII="/><!--Compte--></a></li>
          </ul>
      </header>
    </div>
  </header>




<main>

  <!-- Carousel -->
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url(https://www.wallpaperup.com/uploads/wallpapers/2016/02/28/900938/2e2dafbb6384feb1f3de8b0e928d4588.jpg);" >

        <div class="container">
          <div class="carousel-caption text-start">
            <!--<h1>Example headline.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>-->
          </div>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url(https://c4.wallpaperflare.com/wallpaper/934/665/171/technology-hardware-wallpaper-preview.jpg);">

        <div class="container">
          <div class="carousel-caption">
            <!--<h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>-->
          </div>
        </div>
      </div>
      <div class="carousel-item" style="background-image: url(https://preview.redd.it/dwi1x8idrqt51.jpg?width=640&crop=smart&auto=webp&s=7ae28e6e5609a034081c04e14f9fbb65ea459529);">

        <div class="container">
          <div class="carousel-caption text-end">
            <!--<h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>-->
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <div class="album py-5 bg-light">
      <div class="container">
          <!-- Filtre  -->
          <!-- Boucle d'affichage des noms des categories -->
          <select class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="location = this.value;">
            <option selected>Categorie</option>
            <?php foreach ($res2 as $line): ?>
              <option value="filtre.php?id_categorie=<?= $line['id_categorie'] ?>"><?= $line['nom_categorie'] ?></option>
            <?php endforeach; ?>
          </select>


        <!-- Produit  -->
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
                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="descriptionProd.php?id=<?= $line['id'] ?>">Voir</a></button>
                      </div>                    
                      <small class="text-muted"><?= $line['prix'] ?>€</small>
                      <button onclick="Toggle1()" id="btnh1" class="btns"><i class="fa-solid fa-heart"></i></button>
                  </div>
                  </div>
              </div>
              </div>
          <?php endforeach; ?>

          <!-- Script Favorie  -->
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
        <h5>Qui sommes nous ?</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Notre Histoire</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Données personnelles</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Mention Légales</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="catalogue.php" class="nav-link p-0 text-muted">Home</a></li>
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

      
 