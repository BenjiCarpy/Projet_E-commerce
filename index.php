<?php
    session_start();

require('connexionDB.php'); 


$sql1 = "SELECT * FROM categorie;"; 
$rqt = $cnx->getRequete($sql1);
$res = $rqt->fetchAll(PDO::FETCH_ASSOC);




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
<link rel="stylesheet" type="text/css" href="style/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pushster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<title>Catalogue</title>



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

        <nav>

            <a href="index.php"><h1 class="logo">Wall-it</h1></a>

                <div class="nav-link">

                    <ul>

                        <li><a href="panier.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAehJREFUWEftlk8uBFEQh79JxJYbYGcjuAEnwAmwssMBJIgDYMkGJ8DWigv4s7TBwh5rC/JLXnde9/RMV3U/MYt5yWTSM7+q+l5VverXYcBWZ8B4GALVVWSYIW+GfuoM/uD/c2A981su2X8AiSXnGASgJ2CuV4biiqwBZ+GHR2A+YblUptXg7xjYtgCNA2/AWBALSGAp1mfkdxG4tQBJ03MnLahUnodg/wVo4/mqm0PLwGVQK1tTLUAy0z1gNzxcA4phBpJQIBPBYgW4agmlss8GHzruqoIL6AjYChYXgJq96VJ5PiJjZVwbdgHFNVczyom+m6z45BaOe+asrocyXZxmpbiwKwfZAqCPVuG4e4E0Jw4dgS3SrnLJyJqhSeDVEsWoqcyOB0hana6lEPAuHmZGCMnUexqCPQesNUNyFjdkqpnUtRcPUPlVUhj5jiz1lXqA5Ch+lSj9evaOgL7l9gKlaO59QK+PyuUFynpJ0zu7BXirlRxIAOonDbj8YuWg0inLrxtluyYZcsT2S9sAnYTL+QuwCdxUhLdoCmZNgeKZJIfPwHQJyKJpNYdi4x3gIPrhGxgtebdokgHNAPfASPB4CmyUvFs0yYDkSAH1bnsv3/qiKBZNkh7yHx+jRdOmNrr3y4ZAdTn7BWBMVCV/w+cLAAAAAElFTkSuQmCC"/><!--Panier--></a></li>
                        <li><a href="profileUser.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAhFJREFUWEftl/0xREEQxFsEhEAEiAARIAJEgAgQASIgA0SACBABIRAB9VO7VXN7+zXvjnqlzH9btTfTr6end25BI4uFkeHRnwK0JOlQ0qaktcD0s6QHSZeS3oewP5ShHUlXkgCVC8AcSLr1ghoC6FTSSWehM0nc7w4vIFrzZLK/hIK0iaB9AFg1d9Yl0cqu8AIicSx2J4nW5YJWbRtdAaorPICWJb2GrB+SOJeEi7beJC2G+yvh3ATlAQQbNyFjjZ1Y1LK02ytwDyAr5h6xeu9/f4gH0OgYshpCO+iipiH0Fn3qRzQEo3bK0AjaaE0Z1hCdfK6iJlnqQwBEK4+h0kY4WwA/6kPUHZVTR8oR+LXxmbQV+NR+76jbH3umLC2KYI8Kr/3Fb7/2TXEOvTCUIR5R3rTa+oHgo9i78XkA0Z49zwibxxW9sbQ1owcQhsgyBiuzBCsKSxuPbjFagJiU80xraAUtqTk1XoQv2WhukjVAMMMyZnXS86imX5/6FqAwyyxTNUBQHL8Q+4et7s0vQQVb6Cgud+TeyvWtBAgB06oYLvsvCCR9do4l4VcTUQJkH9EhbSqJ1raPGlOrbQnQp8nYEr538qq5c8UY7/tQhWmaddxTwFab6Cj+Y/m+lwNk9YOZcZ5noBv+8RJTOsoBGrQLOxBX85daFtsEnROUOgqXrpK7mH/egp0Z7z+gFoWjY+gLrcNtJQd+2ekAAAAASUVORK5CYII="/> <!--Compte--></a></li>
                        <?php
                            if (!empty($_SESSION['connectedUser'])){
                                ?>
                                <li><a href="dcnx.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAU1JREFUWEftl+1RAkEMhh8qwE60A7QDOoBOxA7sQDtQKwA7oARL0ApgXufCRIb1brM7sjiXGf5w+/Hsm02ymdCYTRrjYQTq80ipQrfArG+TxPcP4A349N9LgJ6BRRDGpgnmDtjaH1GgOfBSCGPTpZLW+7Yo0Aq479Z4BzYBOJv/g6MG0AMgwFzbuQkHjhHIqfK/FLoBlHMeuxP6S/3nd2gJPAF+Y8HpJ1OERaIs5DKf/KJKpKIvC+gKWANyldnZgAQhGEF5i7pGBzllgxSy+5Kb5H4bn8p1lwmkk8plcs/06NjRmpUqK4MUMgbdH0Fdt3CpvTDNhL2HSiVGeylGXZnlsuOoaap0nArps9ayESiSlZt2WbTG+YRZ/KbWW0gFuIZVaYMEUqNR/OoeesWNoimj/HRo8jLlUiv9WrOVztx/2PBoXzZs9cCoEahPtD0U9lglrwqQnwAAAABJRU5ErkJggg=="/></a></li>
                                <?php
                            }
                        ?>
                        <li><a href="catalogue.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAaJJREFUWEftmIFNxDAMRd9NgNgAJgAmgA1gA2AC2ADYgA2ADWACYAOYAEaACUAf1ZXrS5rjmqI7VEtVrznX+fl2bKczVkxmK4aHtQF0CewDByMx+ATouor2Uwy9ADsjAYlmNdeeH4yAxMzFH4GxacSS5v2RCMiz01F0IL/c71wMlnT8wp99aESDJUPCMqrOBKjk+omhIQxtA+8hBWwBb25sE/iooNN6KrpM2VMZWpLa9jFPLatzDZw18zwAR7k8dALcuBULwF3zfOwTWEWdU+A2B0jjnqWxk3YnKaYytcZK5UNGxOR9T817bdyglVsIpBY35/JU6veAPoENQHer0PK/yXkDzoqxgAhE1FHXoMts6Z6M0xKgXD0b4kq/4F8zNAFa1mWKkUNAiTIlSqiKpbmOMGyaKi7zSa0US6XEWQWQSoXtkhIgMaUS5KV6UA9t0CZAck8fi/+LISsXMSjtuT2+JAI3p2NlZOHSoRceS9un0v86JOro1UruXKWkpv5nTFGfpa6hI30fG3Z9J1cZmVqXDjNmf22+flQmZHFzE0Mlrr4BN4COJS48fQAAAAAASUVORK5CYII="/><!--Catalogue--></a></li>
                        
                </div>

                    <!--<img src="E:\PortfolioV2\image\menu-bar.png" alt="menu bar" class="bar-nav">-->

                </ul>
        </nav>

     </header>
     
    <main class="contenue">

        <div class="presente">

            <h3 class="who">Votre boutique en ligne préférer est bientôt en ligne.</h3>

            <p class="asavoir">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate facilisis risus a tincidunt.
                Maecenas auctor arcu ut molestie facilisis.
                Mauris vitae sagittis massa. Aenean vestibulum interdum risus, eu scelerisque odio venenatis sed.
                Aliquam volutpat id mauris vitae efficitur. Mauris placerat tincidunt dolor id rhoncus.<br>
            </p>

                <button class = btnA><a href="catalogue.php">A venir...</a></button>

        </div>
                
        <div class="image">
            <img src="media/pc-hardware.png" alt="image">
        </div>
                
      
    </main>

  






<div class="album py-5 bg-light">
  <div class="container">
      <!-- Filtre  -->
      <!-- Boucle d'affichage des noms des categories -->
      
        


    <!-- Produit  -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php foreach ($res as $line): ?>
          <div class="col">
          <div class="card shadow-sm">
                <title><?= $line['nom_categorie'] ?></title>
                <img class="imgProd" src="<?= $line['image_categorie'] ?>">

              <div class="card-body">
              <div class="title"><h6><?= $line['nom_categorie'] ?></h6></div>
              <br>
              
              <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="filtre.php?id_categorie=<?= $line['id_categorie'] ?>">Voir</a></button>
                    
                  </div>                    
                  
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
