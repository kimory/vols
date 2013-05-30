<?php

namespace dao;

use \PDO;
use entity\Client;

class MysqlDao {

    private $dbh;

    public function __construct() {
        // Connexion à la BD. Les options permettent de renvoyer une exception
        // + d'afficher correctement en UTF8 :
        $attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER, DB_PASSWORD, $attributes);
    }
    
    public function getRecherche($villedep,$villearrivee,$datedep,$datearrivee,
                                 $nbreadultes,$nbreenfants){
        $sql= "SELECT lieudep, lieuarriv, dateheuredep,dateheurearrivee FROM vol 
              WHERE lieudep =:villedep AND lieuarrivee =:villearrivee";
        $stmt =$this->dbh->prepare($sql);
        $stmt->execute(array("lieudep"=>$villedep,"lieuarriv"=>$villearrivee));
        
    }
    
    public function getInfosClient($idClient){
        $sql="select * from client where numclient=:id";
        $stmt = $this->dbh->prepare($sql);   
        $stmt->bindParam(":id", $idClient);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $numclient = $row['numclient'];
        $civilite = $row['civilite'];
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $adresse = $row['adresse'];
        $codepostal = $row['codepostal'];
        $ville = $row['ville'];
        $pays = $row['pays'];
        $mail = $row['mail'];
        $telfixe = $row['telfixe'];
        $telportable = $row['mobile'];
        $login = $row['login'];
        $password = $row['password'];

        $client = new Client($numclient, $civilite, $nom, $prenom, $adresse, $codepostal, $ville, $pays, $mail, $telfixe, $telportable, $login, $password);
        return $client;
    }
}

?>
