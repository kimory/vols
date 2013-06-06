<?php

namespace dao;

use \PDO;
use entity\Client;
use entity\Passager;
use entity\Reservation;
use entity\Vol;
use entity\Employe;

class MysqlDao {

    private $dbh;

    public function __construct() {
        // Connexion à la BD. Les options permettent de renvoyer une exception
        // + d'afficher correctement en UTF8 :
        $attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, $attributes);
    }

    public function getRecherche($villedep, $villearrivee, $datedep,$nbreadultes, $nbreenfants) {
        $sql = "SELECT lieudep, lieuarriv, dateheuredep, tarif FROM vol 
              WHERE lieudep =:villedep AND lieuarrivee =:villearrivee";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array("lieudep" => $villedep, "lieuarriv" => $villearrivee));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){            
            if($datedep = $row['dateheuredep']){
               return array(
                   "lieudep" => $villedep,
                   "lieuarriv" => $villearrivee,
                   "tarif" => $row['tarif'],
                   "dateheuredep" => $row['dateheuredep']
                   );
            }else{
               $tab['lieudep'][] = $row['lieudep'];
               $tab['lieuarriv'][] = $row['lieuarriv'];
               $tab['tarif'][] = $row['tarif'];
               $tab['dateheuredep'][] = $row['dateheuredep'];
            }
        }
        return $tab;
    }

    public function getInfosClientById($idClient) {
        // récupère les infos sur un client en fonction de son ID
        // et retourne un objet Client
        $sql = "select * from client where numclient=:id";
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

        return new Client($numclient, $civilite, $nom, $prenom, $adresse, $codepostal,
                $ville, $pays, $mail, $telfixe, $telportable, $login, $password);
    }

    public function getInfosPassagerById($idPassager) {
        // récupère les infos sur un passager en fonction de son ID
        // et retourne un objet Passager
        $sql = "SELECT passager.numpassager, civilite, nom, prenom, datenaissance, numreservation, numclient
              FROM passager
              INNER JOIN place ON passager.numpassager = place.numpassager
              INNER JOIN reservation ON place.numreservation = reservation.numreserv
              WHERE passager.numpassager = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(":id", $idPassager);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $numpassager = $row['numpassager'];
        $civilite = $row['civilite'];
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $datenaissance = $row['datenaissance'];
        $numclient = $row['numclient'];
        $numreservation = $row['numreservation'];

        return new Passager($numpassager, $civilite, $nom, $prenom, $datenaissance,
                $numclient, $numreservation);
    }
    
    public function getInfosReservationById($idReservation) {
        // récupère les infos sur un passager en fonction de son ID
        // et retourne un objet Passager
        $sql = "SELECT reservation.numreserv, vol.numvol, dateheuredep, client.numclient, count( place.numpassager ) AS nbpassager
                FROM reservation
                INNER JOIN client ON reservation.numclient = client.numclient
                INNER JOIN place ON place.numreservation = reservation.numreserv
                INNER JOIN vol ON place.numvol = vol.numvol
                INNER JOIN passager ON passager.numpassager = place.numpassager
                WHERE reservation.numreserv = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(":id", $idReservation);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $numreservation = $row['numreserv'];
        $numvol = $row['numvol'];
        $dateduvol = $row['dateheuredep'];
        $numclient = $row['numclient'];
        $nbpassager = $row['nbpassager'];

        // On aura besoin uniquement des numéros de client et de vol :
        $client = new Client($numclient, null, null, null, null, null, null, null, null, null, null, null, null);
        $vol = new Vol($numvol, null, null, null, null, null, null, null, null, null, null);
        
        return new Reservation($numreservation, null, $client, $vol, $nbpassager, $dateduvol);
    }
    
    public function getPassagersEtPlacesByReservation($numreservation){
        // retourne un tableau avec les noms des passagers et leurs places pour
        // une réservation donnée.
        $sql = "SELECT numpassager, numplace
                FROM place
                INNER JOIN reservation ON place.numreservation = reservation.numreserv
                WHERE place.numreservation = :numreservation";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(":numreservation", $numreservation);
        $stmt->execute();
        
        $soustableau = array();
        $tab = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $soustableau['numpassager'] = $row['numpassager'];
            $soustableau['numplace'] = $row['numplace'];
            $tab[] = $soustableau;
        }
        return $tab;
    }
    
    public function getVolById($numvol){
        $sql = "SELECT V.numvol, lieudep, lieuarriv, dateheuredep, dateheurearrivee, T.pilote,
                T.copilote, T.hotesse_steward1, T.hotesse_steward2, T.hotesse_steward3, count(P.numplace) AS nb_places_vendues
                FROM vol V
                INNER JOIN travailler T ON T.vol = V.numvol
                INNER JOIN place P ON P.numvol = V.numvol
                WHERE V.numvol = :numvol";

        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(":numvol", $numvol);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $numvol = $row['numvol'];
        $lieudep = $row['lieudep'];
        $lieuarriv = $row['lieuarriv'];
        $dateheuredep = $row['dateheuredep'];
        $dateheurearrivee = $row['dateheurearrivee'];
        $pilote = $row['pilote'];
        $copilote = $row['copilote'];
        $hotesse_steward1 = $row['hotesse_steward1'];
        $hotesse_steward2 = $row['hotesse_steward2'];
        $hotesse_steward3 = $row['hotesse_steward3'];
        $nb_places_restantes = Vol::NB_PLACES - $row['nb_places_vendues'];
           
        return $vol = new Vol($numvol, $lieudep, $lieuarriv, $dateheuredep, $dateheurearrivee, null,
                     $pilote, $copilote, $hotesse_steward1, $hotesse_steward2, $hotesse_steward3, $nb_places_restantes);
    }

}

?>
