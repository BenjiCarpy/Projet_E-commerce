<?php
/**
 * @author Benjamin Carpy <benjamin.carpys@gmail.com>
 * @copyright Copyright (c) 2002, Benjamin Carpy 
 * @version 1.0
 */

include_once("connexionDB.php");
?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="icon.png">
    <title>Connexion</title>
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
        width: 50%;
        height: auto;
        flex: 50%;
        padding: 30px;
        text-align: center;
    }

</style>



<body>
    <div class="containt">
        <form name="form" action="register.php" method="POST">
            <img class="mb-4" src="media/icon/icon.ico" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Identification</h1>

            <div class="form-floating">
                <label for="floatingInput">Utilisateur</label>
                <input type="text" class="form-control" id="floatingInput" placeholder="Jhon">
            </div>
            <div class="form-floating">
            <label for="floatingPassword">Mot de passe</label>
                <input type="password" class="form-control" id="floatingPassword" placeholder="mot de passe">
            </div>

            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me">Se souvenir</label>
            </div>

            <input id="btn" type="submit" name="ConnexionVald" value="Se connecter" />
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
            <p>Vous n'avez pas de compte ? <a href="register.php">S'inscrire</a></p>
        </form>
    </div>

</body>

</html>