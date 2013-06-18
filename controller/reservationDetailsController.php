<?php

namespace controller;



use dao\MysqlDao;

class reservationDetailsController {

	public function action() {

		$dao = new MysqlDao();

		if($dao->isClientConnected() && // on vérifie que le client est bien connecté
			isset($_GET['numreservation']) && 
			strlen($_GET['numreservation']) > 0)
		{
			$numreservation = $_GET['numreservation'];
			// On récupère un tableau de tableaux qui contient la liste des
			// informations sur la réservation
			$result = $dao->getReservationDetails($numreservation);

			if ($result == null) 
			{
				$_SESSION['error_message'] = 'Réservation introuvable.';
				$_SESSION['resultat_infos_reservation'] = "";
				// On stocke 1 message d'erreur en session
				// et on renvoie vers la page précédente
				header('Location:' . $_SERVER['HTTP_REFERER']);
			} else {
				// Si tout est ok, on enregistre le résultat en session
				$_SESSION['resultat_infos_reservation'] = $result;
				header('Location:/espaceclient');
			}
			// normalement impossible d'arriver ici
			// puisqu'on ne peut pas afficher le formulaire qui amène à ce controleur
			// si le client n'est pas connecté
		} else {
			$_SESSION['error_message'] = "Vous n'êtes pas connecté.";
			header('Location:' . $_SERVER['HTTP_REFERER']);
		}
	}

}

?>
