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
            <form name="form" action="register.php" method="POST">
                <!-- Début du formulaire -->
                <h1>Inscription</h1>
                <!--id du client-->
                <div class="form">
                    <label for="id">Identifiant *: </label>
                    <input type="text" name="identifiant_utilisateur" id="identifiant_utilisateur" required/>
                </div>
                <!--Nom du client-->
                <div class="form">
                    <label for="nom">Votre nom *: </label>
                    <input type="text" name="nom" id="nom" required />
                </div>
                <!--Prénom du client-->
                <div class="form">
                    <label for="prenom">Votre prénom *: </label>
                    <input type="text" name="prenom" id="prenom" required />
                </div>
                <!--Numéro de téléphone du client-->
                <div class="form">
                    <label for="tel">Votre numéro de téléphone : </label>
                    <input type="tel" name="tel" id="tel" />
                </div>
                <!--E-mail du client-->
                <div class="form">
                    <label for="mail">votre e-mail *: </label>
                    <input type="email" name="mail" id="mail" required/>
                </div>
                <!--Adresse du client-->
                <div class="form">
                    <label for="adresse">votre Adresse : </label>
                    <input type="text" name="adresse" id="adresse"/>
                </div>
                <!--Mot de passe-->
                <div class="form">
                    <label for="pass">Votre mot de passe *: </label>
                    <input type="password" name="pass" id="pass" required/>
                </div>
                <p>Les informations ayant une * sont nécessaire.</p>
                <button type="submit" name="valider" class="btn btn-primary">S'inscrire</button>

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
        if (!empty($_POST['mail']) && !empty($_POST["pass"])) {
            $identifiant_utilisateur=$_POST["identifiant_utilisateur"];
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $tel=$_POST["tel"];
            $mail=$_POST["mail"];
            $pass=password_hash($_POST["pass"], PASSWORD_DEFAULT);;
            //var_dump($_POST);
            //var_dump($email);
            //var_dump($password);
        
            $sql = ('INSERT INTO utilisateur (identifiant_utilisateur , nom_utilisateur , prenom_utilisateur, tel_utilisateur , mail_utilisateur ,  mdp_utilisateur) 
            VALUES (:identifiant_utilisateur, :nom, :prenom, :tel , :mail, :pass)');
            $stmt = $cnx->prepare($sql);
            $stmt->bindParam(':identifiant_utilisateur', $_POST["identifiant_utilisateur"]);
            $stmt->bindParam(':nom', $_POST["nom"]);
            $stmt->bindParam(':prenom', $_POST["prenom"]);
            $stmt->bindParam(':tel', $_POST["tel"]);
            $stmt->bindParam(':mail', $_POST["mail"]);
            $stmt->bindParam(':pass', $pass);
            $res = $stmt->execute();

            echo "Inscription réussie";
            header('Location: login.php');
        }
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    
?>