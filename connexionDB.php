
<?php 
/** 
*   Cette classe correspond à un compte bancaire
*   
*   @author BTSSIO 2 HOUMADI Hilani
*   @copyright 2022 BTS SIO
*   @version 1.0 
*/



class Connexiondb{
    /** 
    *   host
    *   @var string  
    */
    private $host = "localhost";
    private $db = "wallidb";
    private $user = "btssio";
    private $pass = "btssio";
    private $sgbd = "mysql";

    protected $cnx;
    

    public function __construct(){

        return $this->connectDB();
	}



    private function connectDB(){
        try{
            $this->cnx = new PDO("$this->sgbd:host=$this->host;dbname=$this->db", $this->user,$this->pass);
        } catch (PDOException $e){
            die("Erreur!: " . $e->getMessage() . "<br>");
        }
    }
     

    // Execute une requête SQL préparé
    public function executeRequete($sql, $vars = null)
    {
        // Exécution d'une requête préparée
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute($vars);

        $results = $rqt->fetch(PDO::FETCH_ASSOC);

        return $results;
    }


    public function getRequete($rqt){
            
        $line = $this->cnx->query($rqt);
            
            if ($line == false) {
                return false;
            } 
            
            return $line;
    }


    // Méthode de déconnexion à la base de données
    public function fermerConnexion() 
    {
        $this->cnx = null;
    }

}

    $cnx = new Connexiondb();
    
?>

