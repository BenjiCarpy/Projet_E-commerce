<?php
session_start();

if (!empty($_SESSION['connectedUser'])){
    if ($_SESSION["connectedUser"]["administrateur"] == "oui"){
        header('Location: profileAdmin.php');
        exit;
    }else{
        header('Location: profileUser.php');
        exit;
    }
}else{
    header('Location: login.php');
}