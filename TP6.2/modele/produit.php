<?php
    /* Accès à la table client de la base de données *************************/
    class Produits {

        // Connection
        private $cnx;
         // Colonne
         public $id;
         public $id_categorie_prod;
         public $nom_prod;
         public $description_produit;
         public $prix;
         public $stock;
         public $image;

        // Connexion à la base de données
        public function __construct(array $donnees){
            $this->hydrater($donnees);
        }

        public function hydrater(array $donnees){
            foreach ($donnees as $key => $value){
                // On récupère le nom du setter correspondant à l'attribut.
                $method = 'set'.ucfirst($key);
    
                // Si le setter correspondant existe.
                if (method_exists($this, $method)){
                    // On appelle le setter.
                    $this->$method($value);
                }
            }
        }
    
        // Getters
        public function getId()     {return $this->id;}
        public function getIdCategorie()   {return $this->id_categorie_prod;}
        public function getNomProd()  {return $this->nom_prod;}
        public function getDescriptionProd()  {return $this->description_produit;}
        public function getPrix()     {return $this->prix;}
        public function getStock()     {return $this->stock;}
        public function getImage()     {return $this->image;} 

        // Setters
        public function setId($id)     {$this->id = $id;}
        public function setIdCategorie($id_categorie_prod)   {$this->id_categorie_prod = $id_categorie_prod;}
        public function setNomProd($nom_prod)  {$this->nom_prod = $nom_prod;}
        public function setDescriptionProd($description_produit)  {$this->description_produit = $description_produit;}
        public function setPrix($prix)     {$this->prix = $prix;}
        public function setStock($stock)     {$this->stock = $stock;}
        public function setImage($image)     {$this->image = $image;} 
    }
?>