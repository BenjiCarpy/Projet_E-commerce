<?php
    /* Accès à la table client de la base de données *************************/
    class Client {

        // Connection
        private $cnx;
        // Colonne
        public $id;
        public $name;
        public $email;
        public $phone;

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
        public function getNom()   {return $this->nom;}
        public function getEmail()  {return $this->email;}
        public function getTelephone()  {return $this->telephone;} 

        // Setters
        public function setId($id)      {$this->id      = $id;}
        public function setNom($nom)  {$this->nom    = $nom;}
        public function setEmail($email){$this->email   = $email;}
        public function setTelephone($telephone){$this->telephone   = $telephone;}

    }
?>