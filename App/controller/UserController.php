<?php

namespace App\Controllers;

use App\Model\User;

class UserController
{
    /**
     * Method in charge of finding all users in a list
     */
    public static function list(): void
    {
        // On charge les données depuis les modèles (si nécessaire)
        $allUser = User::findAll();
        
        // On affiche la page
        require __DIR__ . '/../view/user/userList.tpl.php';
    }


}
