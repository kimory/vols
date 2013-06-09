<?php

namespace controller;

session_start();

use dao\MysqlDao;

class reservationsController {

	public function action() {

		if(isset($_SESSION['login']) && strlen($_SESSION['login']) > 0)
		{
			$login = $_SESSION['login'];

			// On vérifie qu'un login et qu'un mot de passe ont été saisis
			$dao = new MysqlDao();
			$result = $dao->getReservations($login);

			if ($result == null) {
				$_SESSION['message'] = 'Pas de réservations.';
				// On stocke 1 message d'erreur en session
				// et on renvoie vers la page précédente
				header('Location:' . $_SERVER['HTTP_REFERER']);
			} else {
				// Si tout est ok, on enregistre le résultat en session
				$_SESSION['resultat_liste_reservations'] = $result;
				header('Location:/espaceclient');
			}
			// normalement impossible d'arriver ici
			// puis qu'on ne peut afficher le formulaire qui amène à ce controleur
			// si le client n'est pas connecté
		} else {
			$_SESSION['message'] = "Vous n'êtes pas connecté.";
			header('Location:' . $_SERVER['HTTP_REFERER']);
		}
	}

}

?>
