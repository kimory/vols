<?php

namespace controller;

use dao\MysqlDao;

class ListeReservationsController {

	public function action() {
		$dao = new MysqlDao();
		if($dao->clientEstConnecte()) // on vérifie au préalable que le client est bien connecté
		{
			$login = $_SESSION['login'];

			// On récupère un tableau de tableaux qui contient la liste des
			// réservations qu'a passées le client
			$result = $dao->getResasByLogin($login);

			if ($result == null) {
				$_SESSION['error_message'] = 'Pas de réservation.';
				// On stocke 1 message d'erreur en session
				// et on renvoie vers la page précédente
				header('Location:' . $_SERVER['HTTP_REFERER']);
			} else {
				// Si tout est ok, on enregistre le résultat en session
				$_SESSION['resultat_liste_reservations'] = $result;
				header('Location:/espace_client');
			}
			// normalement impossible d'arriver ici
			// puis qu'on ne peut pas afficher le formulaire qui amène à ce controleur
			// si le client n'est pas connecté
		} 
		else 
		{
			$_SESSION['error_message'] = "Vous n'êtes pas connecté.";
			header('Location:' . $_SERVER['HTTP_REFERER']);
		}
	}
}

?>
