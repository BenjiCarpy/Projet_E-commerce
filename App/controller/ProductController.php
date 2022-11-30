<?php

namespace App\Controllers;

use App\Model\Product;

class ProductController
{
    /**
     * Method in charge of showing product
     */
    public static function show(int $id): void
    {
        // On charge les données depuis les modèles (si nécessaire)
        $products = Product::find($id);

        // On affiche la page
        require __DIR__ . '/../view/product/show.tpl.php';
    }

    public static function list(): void
    {
        // On charge les données depuis les modèles (si nécessaire)
        $products = Product::findAll();

        // On affiche la page
        require __DIR__ . '/../view/product/show.tpl.php';
    }

    /**
     * Method in charge of showing all products
     */
    public static function index(): void
    {
        // On charge les données depuis les modèles (si nécessaire)
        //$items = class::findAll();

        // On affiche la page
        require __DIR__ . '/../view/product/index.tpl.php';
        
    }
}
