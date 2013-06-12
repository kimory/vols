<?php

namespace dao;

use \PDO;
use entity\Client;
use entity\Passager;
use entity\Reservation;
use entity\Vol;
use entity\Employe;
use \DateTime;

class MysqlDao {

	private $dbh;

	public function __construct() {
		// Connexion à la BD. Les options permettent de renvoyer une exception
		// + d'afficher correctement en UTF8 :
		$attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
		$this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, $attributes);
	}

	public function getPropositions($villedep, $villearrivee, $datedep, $nbadultes, $nbenfants)
	{
		// Retourne un tableau d'objets Vol        
		// On récupère les vols qui correspondent au choix du client s'ils ne sont pas complets
		$sql = "SELECT V.numvol AS numvol,
			DATE_FORMAT(V.dateheuredep, '%d/%m/%Y %H:%i') as datedep,
			V.tarif
			FROM vol V
			WHERE V.numvol IN
			(
				SELECT V2.numvol
				FROM vol V2
				LEFT JOIN place P ON P.numvol = V2.numvol
				WHERE
				V2.lieudep=:villedep AND
				V2.lieuarriv=:villearrivee AND
				DATE_FORMAT(V2.dateheuredep,'%Y-%m-%d')=:datededepart
				GROUP BY V2.numvol
				HAVING ( :nbplaces - ifnull(count(P.numplace),0)) >= :nbplacesrequises
			)";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(':villedep', $villedep);
		$stmt->bindParam(':villearrivee', $villearrivee);
		$datedepart = new DateTime($datedep);
		$stmt->bindParam(':datededepart', $datedepart->format('Y-m-d'));
		$nbplaces = Vol::NB_PLACES;
		$stmt->bindParam(':nbplaces', $nbplaces);
		$nbpassagers = $nbadultes + $nbenfants;
		$stmt->bindParam(':nbplacesrequises', $nbpassagers);
		$stmt->execute();
		$result = array();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$numvol = $row['numvol'];
			$datedep = $row['datedep'];
			// Ici on passe le tarif que l'utilisateur devra payer, soit
			// le prix du vol multiplié par le nombre de passagers (pour les
			// enfants, le tarif est fixé à 50 €)
			$tarif = $row['tarif'] * $nbadultes + 50 * $nbenfants;
			$vol = new Vol($numvol, $villedep, $villearrivee, $datedep, null, $tarif, null, null, null, null, null, null);
			$result[] = $vol; // on insère l'objet $vol dans le tableau $result
		}

		if(sizeof($result) == 0)
		{
			// si il n'y a pas de vol dispo à la date souhaitée, on récupère les vols
			// après cette date
			$sql = "SELECT V.numvol AS numvol,
				DATE_FORMAT(V.dateheuredep, '%d/%m/%Y %H:%i') as datedep,
				V.tarif as tarif
				FROM vol V
				WHERE V.numvol IN 
				(
					SELECT V2.numvol
					FROM vol V2
					LEFT JOIN place P ON P.numvol = V2.numvol
					WHERE
					V2.lieudep=:villedep AND
					V2.lieuarriv=:villearrivee AND 
					(UNIX_TIMESTAMP(:datededepart) - UNIX_TIMESTAMP(DATE_FORMAT(V2.dateheuredep,'%Y-%m-%d'))) < 0
					-- on transforme dans un format identique les 2 dates : 
					-- UNIX_TIMESTAMP (entier qui augmente à chaque seconde).
					-- ifnull(expr1,expr2) si expr1 null alors expr2
					GROUP BY V2.numvol
					HAVING ( :nbplaces - ifnull(count(P.numplace),0)) >= :nbplacesrequises
				)";

			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(':villedep', $villedep);
			$stmt->bindParam(':villearrivee', $villearrivee);
			$datedepart = new DateTime($datedep);
			$stmt->bindParam(':datededepart', $datedepart->format('Y-m-d'));
			$nbplaces = Vol::NB_PLACES;
			$stmt->bindParam(':nbplaces', $nbplaces);
			$nbpassagers = $nbadultes + $nbenfants;
			$stmt->bindParam(':nbplacesrequises', $nbpassagers);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$numvol = $row['numvol'];
				$datedep = $row['datedep'];
				// Ici on passe le tarif que l'utilisateur devra payer, soit
				// le prix du vol multiplié par le nombre de passagers (pour les
				// enfants, le tarif est fixé à 50 €)
				$tarif = $row['tarif'] * $nbadultes + 50 * $nbenfants;
				$vol = new Vol($numvol, $villedep, $villearrivee, $datedep, null, $tarif, null, null, null, null, null, null);
				$result[] = $vol; // on insère l'objet $vol dans le tableau $result
			}
		}

		return $result;
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
		// récupère les infos sur une réservation en fonction de son ID
		// et retourne un objet Reservation
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
		$vol = new Vol($numvol, null, null, null, null, null, null, null, null, null, null, null);

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
		// récupère les infos sur un vol en fonction de son ID
		// et retourne un objet Vol
		$sql = "SELECT V.numvol, lieudep, lieuarriv, dateheuredep, dateheurearrivee, T.pilote,
			T.copilote, T.hotesse_steward1, T.hotesse_steward2, T.hotesse_steward3, count(P.numplace) AS nb_places_vendues
			FROM vol V
			LEFT JOIN travailler T ON T.vol = V.numvol
			LEFT JOIN place P ON P.numvol = V.numvol
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

	public function getEmployeById($idEmploye){
		// récupère les infos sur un employé en fonction de son ID
		// et retourne un objet Employe

		$sql = 'SELECT numemploye, civilite, nom, prenom, fonction
			FROM employe
			WHERE numemploye = :id';

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(":id", $idEmploye);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$numemploye = $row['numemploye'];
		$civilite = $row['civilite'];
		$nom = $row['nom'];
		$prenom = $row['prenom'];
		$fonction = $row['fonction'];

		return new Employe($numemploye, $civilite, $nom, $prenom, null, null, null, null, $fonction);
	}


	public function getVolsByEmploye($numemploye){
		// retourne un tableau des vols (objets) liés à un employé

		$sql = "SELECT numvol, lieudep, lieuarriv, dateheuredep
			FROM employe
			INNER JOIN travailler ON employe.numemploye = travailler.pilote
			OR employe.numemploye = travailler.copilote
			OR employe.numemploye = travailler.hotesse_steward1
			OR employe.numemploye = travailler.hotesse_steward2
			OR employe.numemploye = travailler.hotesse_steward3
			INNER JOIN vol ON travailler.vol = vol.numvol
			WHERE numemploye = :numemploye";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(":numemploye", $numemploye);
		$stmt->execute();

		$vols = array();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$numvol = $row['numvol'];
			$lieudep = $row['lieudep'];
			$lieuarriv = $row['lieuarriv'];
			$dateheuredep = $row['dateheuredep'];

			// On insère un objet Vol au prochain emplacement disponible du tableau vols :
			$vols[] = new Vol($numvol, $lieudep, $lieuarriv, $dateheuredep, null, null, null, null, null, null, null, null);
		}
		return $vols;
	}

	public function backOfficeLogin($login, $passwd){
		// renvoie un tableau avec le login et le mot de passe chiffré
		$sql = "SELECT login 
			FROM user 
			WHERE login=:login and password=:passwd";

		// le grain de sel utilisé lors du chiffrement commence par "$5$..." -> c'est du sha256
		$passwd = crypt($passwd, '$5$ABCDEFGHIJKLM');

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(":login", $login);
		$stmt->bindParam(":passwd", $passwd );
		$stmt->execute();

		if($stmt->fetch(PDO::FETCH_ASSOC)){
			return array($login, $passwd);
		}

		return null;
	}

	public function clientLogin($login, $passwd){
		// renvoie un tableau avec le login et le mot de passe
		$sql = "SELECT login 
			FROM client 
			WHERE login=:login and password=:passwd";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(":login", $login);
		$stmt->bindParam(":passwd", $passwd );
		$stmt->execute();

		if($stmt->fetch(PDO::FETCH_ASSOC)){
			return array($login, $passwd);
		}

		return null;
	}

	public function isClientConnected() 
	{
		// Renvoie "true" si le client est connecté, "false" sinon

		// On vérifie que le login et le mot de passe sont en session et
		// sont corrects par rapport à la BDD
		if(isset($_SESSION['login'], $_SESSION['passwd']) &&
			strlen($_SESSION['login']) > 0 &&
			strlen($_SESSION['passwd']) > 0)
		{
			$sql = "SELECT login
				FROM client
				where login=:login and password=:passwd";

			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(":login", $_SESSION['login']);
			$stmt->bindParam(":passwd", $_SESSION['passwd']);
			$stmt->execute();

			if($stmt->fetch(PDO::FETCH_ASSOC)) // on vérifie que ça renvoie qqch
			{
				return true; // renvoie 'vrai' et sort de la fonction
			}
		}
		// On détruit les variables dans le cas où un login et un mot de passe sont
		// en session mais ne sont pas corrects (par rapport à la BDD)
		unset($_SESSION['login']);
		unset($_SESSION['passwd']);

		return false;
	}

	// Ne pas oublier que le mot de passe enregistré est déjà chiffré
	public function isAdminConnected()
	{
		// Renvoie "true" si l'admin est connecté, "false" sinon

		// On vérifie que le login et le mot de passe sont en session et
		// sont corrects par rapport à la BDD
		if(isset($_SESSION['login_admin'], $_SESSION['passwd']) &&
			strlen($_SESSION['login_admin']) > 0 &&
			strlen($_SESSION['passwd']) > 0)
		{
			$sql = "SELECT login
				FROM user
				where login=:login and password=:passwd";

			$stmt = $this->dbh->prepare($sql);
			$stmt->bindParam(":login", $_SESSION['login_admin']);
			$stmt->bindParam(":passwd", $_SESSION['passwd']);
			$stmt->execute();

			if($stmt->fetch(PDO::FETCH_ASSOC)) // on vérifie que ça renvoie qqch
			{
				return true;  // renvoie 'vrai' et sort de la fonction
			}
		}
		// On détruit les variables dans le cas où un login et un mot de passe sont
		// en session mais ne sont pas corrects (par rapport à la BDD)
		unset($_SESSION['login_admin']);
		unset($_SESSION['passwd']);

		return false;
	}

	public function getReservations($login) 
	{
		$sql = "SELECT DISTINCT R.numreserv AS numreservation, 
			R.datereserv AS datereservation, 
			V.lieudep AS lieudepart, 
			V.lieuarriv AS lieuarrivee, 
			V.dateheuredep AS datedepart
			FROM reservation R
			INNER JOIN place P ON P.numreservation = R.numreserv
			INNER JOIN vol V ON V.numvol = P.numvol
			INNER JOIN client C ON C.numclient = R.numclient
			WHERE C.numclient = (
				SELECT numclient FROM client WHERE login=:login)";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(":login", $login );
		$stmt->execute();

		$result = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result[] = $row; // on insère une copie du tableau $row dans $result
		}

		return $result;
	}

	public function getReservationDetails($numreservation)
	{
		$sql = "SELECT 
			R.numreserv AS numreservation, 
			R.datereserv AS datereservation, 
			V.lieudep AS lieudepart, 
			V.lieuarriv AS lieuarrivee, 
			V.dateheuredep AS datedepart,
			P.prix AS prix,
			P.numplace AS numeroplace,
			P.numpassager AS numeropassager
			FROM reservation R
			INNER JOIN place P ON P.numreservation = R.numreserv
			INNER JOIN vol V ON V.numvol = P.numvol
			INNER JOIN client C ON C.numclient = R.numclient
			WHERE R.numreserv=:numreservation";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(":numreservation", $numreservation );
		$stmt->execute();

		$result = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$result[] = $row; // on insère une copie du tableau $row dans $result
		}

		return $result;
	}

}

?>
