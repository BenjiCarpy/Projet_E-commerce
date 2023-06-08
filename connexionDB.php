
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
    private $host = "mysql-wall-it.alwaysdata.net";
    private $db = "wall-it_wallidb";
    private $user = "wall-it";
    private $pass = "BTSSIO@25jo";
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

    public function getCatalogue()
        {
            $sql = "SELECT * FROM produit WHERE id_categorie_prod= ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $clients = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête
            return $clients;
        }

    public function deleteProduit($id){
        $sql = "DELETE FROM produit WHERE id= ?;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($id));
        $cnx = $rqt->fetch();
        $rqt->closeCursor();    // Ferme le curseur, permettant à la requête d'être de nouveau exécutée 
        return $cnx;
        /*$stmt = $this->cnx->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();*/
    }


    // Méthode de déconnexion à la base de données
    public function fermerConnexion() 
    {
        $this->cnx = null;
    }

}

    $cnx = new Connexiondb();
    
?>

