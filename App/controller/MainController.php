<?php

namespace App\Controllers;

use App\Model\Category;

class MainController
{
    /**
     * Method in charge of home page
     */
    public static function home(): void
    {
        // On charge les données depuis les modèles
        $categories = Category::findAll();

        // On affiche la page
        require __DIR__ . '/../view/main/home.tpl.php';
    }
}
