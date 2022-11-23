<?php

class Controleur {
     public $manageproduit;

     public function __construct()
     {
          require_once("modele/modeleProduit.php");
          $this->modeleProduit = new modeleProduit();
          $this->modeleProduit->getConnection();
     }

     public function Dispatcher($action, $id = null)
     {
          switch ($action) 
          {
               case 'editer' :
                    // Appeler un client identifier par id
                    $element = $this->modeleClient->getProduit($id);
                    require_once("modele/produit.php");
                    $client = new Produit($element);
                    include 'vue/vueClient.php';
                    break;

                    case 'supprimer' :
                         // Appeler un client identifier par id
                         $element = $this->modeleClient->deleteClient($id);
                         require_once("modele/client.php");
                         $client = new Client($element);
                         include 'vue/vueClient.php';
                         break;
     
     
     
                    case 'ajouter' :
                         include 'vue/vueAjout.php';
                         break;

                    case 'valideAjout' :
                         // Appeler un client identifier par id
                         $element = $this->modeleClient->addClient();
                         require_once("modele/client.php");
                         $client = new Client($element);
                         include 'vue/vueUpdate.php';
                         break;
     
     
     
                    case 'modifier' :
                         // Appeler un client identifier par id
                         $element = $this->modeleClient->getClient($id);
                         require_once("modele/client.php");
                         $client = new Client($element);
                         include 'vue/vueUpdate.php';
                         break;
     

               default:
                    // On appel la liste de tous les clients
                    $Produits =this->modeleProduit->getProduit();
                    include 'vue/vueProduit.php';
               break;
     
          }
     }
}
?>
        
