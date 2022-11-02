<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .containt{
            height: auto;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            padding: 30px;
            text-align: center;
            width: 50%;
            justify-content: center;
        }

        .text {
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="containt">

        <h1>Profil</h1>
        <?php
            if(!empty($_SESSION)){
        ?>
                <!--id du client-->
                <div class="text">
                    <p>Votre pseudo: <?= $_SESSION['connectedUser']['identifiant_utilisateur']?> </p>
                </div>

                <!--Nom du client-->
                <div class="text">
                    <p>Votre Nom : <?= $_SESSION['connectedUser']['nom_utilisateur']?> </p>
                </div>

                <!--Prénom du client-->
                <div class="text">
                    <p>Votre Prénom : <?= $_SESSION['connectedUser']['prenom_utilisateur']?> </p>
                </div>

                <!--Numéro de téléphone du client-->
                <div class="text">
                    <p> Votre numéro de téléphone : <?= $_SESSION['connectedUser']['tel_utilisateur']?> </p>
                </div>
                
                <!--E-mail du client-->
                <div class="text">
                    <p>Votre adresse mail : <?= $_SESSION['connectedUser']['mail_utilisateur'] ?></p>
                </div>

                <!--Pays du client-->
                <div class="text">
                    <p>Votre Pays : <?= $_SESSION['connectedUser']['pays'] ?></p>
                </div>

                <!--Ville du client-->
                <div class="text">
                    <p>Votre Pays : <?=$_SESSION['connectedUser']['ville'] ?></p>
                </div>

                <!--Code postal du client-->
                <div class="text">
                    <p>Votre Code postal : <?= $_SESSION['connectedUser']['code_postal'] ?></p>
                </div>

                <nav id="profileNav">
                    <a href="index.php"><img src="media\icon\left-arrow-svgrepo-com.svg" alt="Accueil" width="20px" height="20px"></a>
                    <a href="modifierProfile.php">Modifier le profil</a>
                </nav>
        <?php
            } else {
                header('Location: login.php');
                exit;
            }
        ?>

    </div>

</body>
</html>
