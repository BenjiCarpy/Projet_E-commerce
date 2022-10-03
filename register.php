<?php
/**
 * @author Benjamin Carpy <benjamin.carpys@gmail.com>
 * @copyright Copyright (c) 2002, Benjamin Carpy 
 * @version 1.0
 */

include_once("connexionDB.php");
?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="icon.png">
    <title>Inscription</title>
</head>

<style>
    *{
        box-sizing: border-box;
    }


    body{
        width: 100%;
        height: 100vh;
        align-items: center;
    }

    h1, p{
        text-align: center;
        margin-bottom: 40px;
    }


    input{
        display: block;
        background: rgba(245, 245, 245, 0.699);
        border: 2px solid #00000000;
        width: 95%;
        padding: 10px;
        margin: 10px auto;
        border-radius: 5px;
    }

    label{
        color: #888;
        font-size: 18px;
        padding: 10px;
    }

    #btn{
        background: #8a2be2;
        border: 2px solid #8a2be2;
    }

    #btn:hover{
        background: #8a2be2;
        border: 2px solid #000000;
    } 

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

    form{
        width: 100%;
    }

    

</style>

<body>

<div class="containt">
        <form name="form" action="registerVald.php" method="POST">
            <!-- Début du formulaire -->

            <h1>Inscription</h1>
            <!--id du client-->
            <div class="form">
                <label for="id">Identifiant *: </label>
                <input type="text" name="id" id="id" required/>
            </div>

            <!--Nom du client-->
            <div class="form">
                <label for="nom">Votre nom *: </label>
                <input type="text" name="nom" id="nom" required />
            </div>
            <!--Prénom du client-->
            <div class="form">
                <label for="prenom">Votre prénom * : </label>
                <input type="text" name="prenom" id="prenom" required />
            </div>
            <!--Numéro de téléphone du client-->
            <div class="form">
                <label for="tel">Votre numéro de téléphone * : </label>
                <input type="tel" name="tel" id="tel" />
            </div>
            <!--E-mail du client-->
            <div class="form">
                <label for="mail">votre e-mail * : </label>
                <input type="email" name="mail" id="mail" required/>
            </div>

            <!--Adresse du client-->
            <div class="form">
                <label for="adresse">votre Adresse * : </label>
                <input type="text" name="adresse" id="adresse" required/>
            </div>

            <!--Mot de passe-->
            <div class="form">
                <label for="pass">Votre mot de passe * : </label>
                <input type="password" name="pass" id="pass" required/>
            </div>
            <p>Les informations ayant une * sont nécessaire.</p>

            <input id="btn" type="submit" name="RegisterVald" value="S'inscrire" />

        </form>
    </div>

</body>

</html>