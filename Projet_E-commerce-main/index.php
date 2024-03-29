<?php
    session_start();
    require('connexionDB.php'); 

    $sql2 = "SELECT id_categorie, nom_categorie, description_categorie, image_categorie  FROM categorie;"; 
    $rqt = $cnx->getRequete($sql2);
    $res2 = $rqt->fetchAll();

?>

<!DOCTYPE html>

<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bienvenue</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="media\icon\icon.ico"/>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Pushster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pushster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />

    </head>
    <style>
        
        body {

        box-sizing: border-box;
        margin: 0;
        padding: 0;
        background-color:white;
        color: black;
        font-family: 'Nunito', sans-serif;
        font-weight: 600;
        display: flex;
        flex-direction: column;

        }

        h1 {

        font-family: 'Pushster', cursive;
        /*font-size: 40px;*/

        }

        li, a{

        color: black;
        font-weight: 700;
        font-size: 16px;
        text-decoration: none;
        }

        nav {

        display: flex;
        height: 10vh;
        justify-content: space-between;
        align-items: center;
        padding: 0px 10%;
        padding-right: 50px;
        padding-left: 50px;

        }


        .btnA {

        color: black;
        margin: 20px 10px;
        padding-left: 20px;
        outline: none;
        border-radius: 10px;
        background: rgb(168, 208, 198);
        border: 2px solid  rgb(168, 208, 198);
        padding: 10px 10px;
        cursor: pointer;  

        }

        .btnA:hover {

        border: 2px solid lightgray;

        }


        h1.logo {

        cursor: pointer;
        font-weight: bold;
        font-size: 40px;
        color: black;

        }

        .nav-link {

        list-style: none;

        }

        .nav-link li{

        display: inline-block;
        padding: 0px 20px;

        }

        .nav-link li a {

        transition: all 0.3s ease 0s;

        }

        .nav-link li a:hover {

        color: rgb(247, 217, 238);

        }

        .nav-link button a:hover{

        color: black;

        }

        .contenue {

        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        padding-top: 150px;

        }
        .presente{

        /*background-color: yellow;*/
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        flex-wrap: wrap;
        width: 50%;

        /*padding-top: 100px;*/
        /*padding-left: 5px;*/
        font-size: 18px;

        }

        img.image {
        width: 50%;

        padding-left: 20px;
        }

        h3.who {

        font-family: 'Press Start 2P', cursive;
        /*margin-left: 250px;*/
        width: 70%;
        height:auto;
        text-align: start;
        font-size: 30px;
        font-weight: 700;
        color: black;

        /*padding-top: 30px;*/
        /*padding-left: 50px;*/
        margin-bottom: 30px;

        }

        p.asavoir {

        /*background-color: crimson;*/
        font-size: 16px;
        text-align: center;
        width: 400px;
        height: 150px;

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


        nav .bar-nav {

        display: none;
        position: absolute;
        top: 15px;
        right: 50px;
        width: 45px;

        }

        @media screen and (max-width: 1150px) {

        nav .bar-nav{

            display: block;

        }

        .nav-link {

            display: none;
            background-color: red;

        }

        .nav-link ul {

            display: flex;
            flex-direction: column;

        }

        }

        #profileNav a {
        margin-right: 0.2em;
        }
    </style>

 <body>
     

    <header>
        <nav>
            <a href="index.php"><h1 class="logo">Wall-it</h1></a>

                <div class="nav-link">
                    <ul>
                        <li><a href="panier.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAehJREFUWEftlk8uBFEQh79JxJYbYGcjuAEnwAmwssMBJIgDYMkGJ8DWigv4s7TBwh5rC/JLXnde9/RMV3U/MYt5yWTSM7+q+l5VverXYcBWZ8B4GALVVWSYIW+GfuoM/uD/c2A981su2X8AiSXnGASgJ2CuV4biiqwBZ+GHR2A+YblUptXg7xjYtgCNA2/AWBALSGAp1mfkdxG4tQBJ03MnLahUnodg/wVo4/mqm0PLwGVQK1tTLUAy0z1gNzxcA4phBpJQIBPBYgW4agmlss8GHzruqoIL6AjYChYXgJq96VJ5PiJjZVwbdgHFNVczyom+m6z45BaOe+asrocyXZxmpbiwKwfZAqCPVuG4e4E0Jw4dgS3SrnLJyJqhSeDVEsWoqcyOB0hana6lEPAuHmZGCMnUexqCPQesNUNyFjdkqpnUtRcPUPlVUhj5jiz1lXqA5Ch+lSj9evaOgL7l9gKlaO59QK+PyuUFynpJ0zu7BXirlRxIAOonDbj8YuWg0inLrxtluyYZcsT2S9sAnYTL+QuwCdxUhLdoCmZNgeKZJIfPwHQJyKJpNYdi4x3gIPrhGxgtebdokgHNAPfASPB4CmyUvFs0yYDkSAH1bnsv3/qiKBZNkh7yHx+jRdOmNrr3y4ZAdTn7BWBMVCV/w+cLAAAAAElFTkSuQmCC"/><!--Panier--></a></li>
                        <li><a href="cnxProfile.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAhFJREFUWEftl/0xREEQxFsEhEAEiAARIAJEgAgQASIgA0SACBABIRAB9VO7VXN7+zXvjnqlzH9btTfTr6end25BI4uFkeHRnwK0JOlQ0qaktcD0s6QHSZeS3oewP5ShHUlXkgCVC8AcSLr1ghoC6FTSSWehM0nc7w4vIFrzZLK/hIK0iaB9AFg1d9Yl0cqu8AIicSx2J4nW5YJWbRtdAaorPICWJb2GrB+SOJeEi7beJC2G+yvh3ATlAQQbNyFjjZ1Y1LK02ytwDyAr5h6xeu9/f4gH0OgYshpCO+iipiH0Fn3qRzQEo3bK0AjaaE0Z1hCdfK6iJlnqQwBEK4+h0kY4WwA/6kPUHZVTR8oR+LXxmbQV+NR+76jbH3umLC2KYI8Kr/3Fb7/2TXEOvTCUIR5R3rTa+oHgo9i78XkA0Z49zwibxxW9sbQ1owcQhsgyBiuzBCsKSxuPbjFagJiU80xraAUtqTk1XoQv2WhukjVAMMMyZnXS86imX5/6FqAwyyxTNUBQHL8Q+4et7s0vQQVb6Cgud+TeyvWtBAgB06oYLvsvCCR9do4l4VcTUQJkH9EhbSqJ1raPGlOrbQnQp8nYEr538qq5c8UY7/tQhWmaddxTwFab6Cj+Y/m+lwNk9YOZcZ5noBv+8RJTOsoBGrQLOxBX85daFtsEnROUOgqXrpK7mH/egp0Z7z+gFoWjY+gLrcNtJQd+2ekAAAAASUVORK5CYII="/> <!--Compte--></a></li>
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
        <section>
        <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 m-auto w-50">
                <div class="owl-carousel owl-theme">
                <?php foreach ($res2 as $line): ?>
                    <div class="item mb-4">
                        <div class="card shadow border-0">
                            <img src="<?= $line['image_categorie'] ?>" alt="<?= $line['nom_categorie'] ?>" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4><?= $line['nom_categorie'] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
    <script>
         $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    <footer>
        
    </footer>

 </body>

</html>
