<?php

//? Require of all models
require_once '../App/Model/Category.php';
require_once '../App/Model/Order.php';
require_once '../App/Model/Product.php';
require_once '../App/Model/User.php';

//? Require of all utils
require_once '../App/Utils/Database.php';

//? Require of all controllers
require_once '../App/Controller/CartController.php';
require_once '../App/Controller/MainController.php';
require_once '../App/Controller/ProductController.php';
require_once '../App/Controller/UserController.php';

use App\Controllers\CartController;
use App\Controllers\MainController;
use App\Controllers\ProductController;
use App\Controllers\UserController;

session_start();

// Url something looks like : localhost/index.php?index=smth
if (!empty($_GET['index'])) {
    switch ($_GET['index']) {
        case 'liste-utilisateur':
            UserController::list();
            break;
        case 'liste-produit':
            ProductController::list();
            break;
        case 'produit':
            ProductController::show($_GET['id']);
            break;
        default:
            header('Location: index.php');
            break;
    }
} else {
    // Display home page
    MainController::home();
}

//! list
/** 
 * ?Cart Controller
 * Add panier
 * panier
 * 
 * ?ProductController
 * desc produit
 * liste des produits (vueproduit)
*  catalogue
*  filtre (par catégorie)
 * add produit
 * update produit (update + verifUpdateProduit)
 * delete produit
 * 
 * ?UserController
 * profile (admin + user)
 * liste des membres (vueclients)
 * register (register + vald)
 * log in (cnx + login + login vald)
 * log out
 * modif profile (modif vald)
 * delete profile
 * 
 */
