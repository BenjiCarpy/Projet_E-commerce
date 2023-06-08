<?php
session_start();
$id = $_SESSION['connectedUser']['id'];


require_once("connexionDB.php");
$cnx1 = new Connexiondb();

?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="icon.png">
    <title>IHM - WEB</title>
</head>

<body>
    <form name="form" action="modifVald.php" method="GET">
        <!-- Début du formulaire -->
        <hr>
    
        <a href="index.php"><img src="media\icon\left-arrow-svgrepo-com.svg" alt="Accueil" width="20px" height="20px"></a>
        <h1>Profil </h1>
        <br><br>
        <label for="pseudo">Pseudo :</label> <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION['connectedUser']['identifiant_utilisateur'] ?>">
        <br><br>
        <label for="nom">Nom :</label> <input type="text" name="nom" id="nom" value="<?= $_SESSION['connectedUser']['nom_utilisateur'] ?>" />
        <br><br>
        <label for="nom">Prenom :</label> <input type="text" name="prenom" id="prenom" value="<?= $_SESSION['connectedUser']['prenom_utilisateur'] ?>" />
        <br><br>
        <label for="tel">Numéro :</label> <input type="text" name="tel" id="tel" value="<?= $_SESSION['connectedUser']['tel_utilisateur'] ?>" />
        <br><br>
        <label for="email">E-mail :</label> <input type="text" name="email" id="email" value="<?= $_SESSION['connectedUser']['mail_utilisateur'] ?>" />
        <br><br>
        <label for="adresse">Ville :</label> <input type="text" name="ville" id="ville" value="<?= $_SESSION['connectedUser']['ville'] ?>" />
        <br><br>
        <label for="adresse">Code Postal :</label> <input type="text" name="code_pos" id="code_pos" value="<?= $_SESSION['connectedUser']['code_postal'] ?>" />
        <br><br>
        <label for="adresse">Pays :</label> <input type="text" name="pays" id="pays" value="<?= $_SESSION['connectedUser']['pays'] ?>" />
        <br><br>

        <input type="submit" name="update" value="Modifier"/>

    </form>

</body>

</html>