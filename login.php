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
            <form name="form" action="login.php" method="POST">
                <img class="mb-4" src="media/icon/icon.ico" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Identification</h1>
                <div class="form-floating">
                    <label for="floatingInput">Email</label>
                    <input type="email" name="mail" class="form-control" id="floatingInput" placeholder="john.michon@gmail.com">
                </div>
                <div class="form-floating">
                <label for="floatingPassword">Mot de passe</label>
                    <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="mot de passe">
                </div>
                <div class="checkboxmb-3">
                    <label><input type="checkbox" value="remember-me">Se souvenir</label>
                </div>

                <input id="btn" type="submit" name="login" value="Se connecter" />
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
                <p>Vous n'avez pas de compte ? <a href="register.php">S'inscrire</a></p>
            </form>
        </div>

    </body>
</html>

<?php
include_once("connexionDB.php");
$cnx = new Connexiondb();
    try{
        $cnx = new PDO("mysql:host=localhost;dbname=wallidb", "btssio", "btssio");
        // Set the PDO error mode to exception
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    try{    
        if (!empty($_POST['mail']) && !empty($_POST['pass'])) {
            $mail = $_POST['mail'];
            $pass = $_POST['pass'];
            //var_dump($mail);
            //var_dump($pass);
            $sql = ('SELECT * FROM utilisateur WHERE mail_utilisateur = :mail');
            $stmt = $cnx->prepare($sql);
            $stmt->bindParam(':mail', $_POST["mail"]);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($res);
            //var_dump($pass);
            if (!empty($res)) {   
                $passwordHash = $res['mdp_utilisateur'];
                // Si le mot de passe de l'utilisateur correspond à celui envoyé
                if (password_verify($pass, $passwordHash)) {
                    // On démarre une session
                    session_start();
                    // On enregistre les informations de l'utilisateur
                    $_SESSION["connectedUser"] = $res;
                    header('Location: index.php');
                    exit;
                } else {
                    print "Mot de passe invalides";
                }
            } else {
                print "Identifiants invalides";
            }
        }
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }    
?>