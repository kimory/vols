<?php

namespace controller;

use dao\MysqlDao;

class AffichageClientController {

    public function action() {
		$dao = new MysqlDao();
		if($dao->adminEstConnecte())
                // On n'exécute la fonction que si l'admin est connecté
		{
			$message = null;
			// On vérifie qu'un numéro de client a été récupéré
			// Soit via le formulaire de recherche :
			if (isset($_POST['numclient']) && strlen($_POST['numclient']) != 0) {
				$numclient = trim($_POST['numclient']);
				// trim supprime les espaces éventuellement saisis par erreur
				// Soit par clic sur un lien :
			} elseif (isset($_GET['numclient']) && strlen($_GET['numclient']) != 0) {
				$numclient = $_GET['numclient'];
			}

			// Si on a récupéré un numéro de client, on exécute la fonction pour
			// récupérer les infos du client :
			if (isset($numclient) && strlen($numclient) != 0) {
				$client = $dao->getClientById($numclient);
				if ($client->getId() == null) {
					// Cas d'un identifiant non valide (= le client n'existe pas en base) :
					$message = 'Le client N°' . htmlentities($numclient, ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
				}
			} else {
				// Cas du champ laissé vide dans le formulaire de recherche :
				$message = 'Vous devez saisir l\'identifiant d\'un client pour
						obtenir sa description !';
			}
			include VIEW . 'bo_client.php';
		} else {
                        // Si la personne n'est pas connectée en tant qu'administrateur,
                        // elle n'a pas à être sur cette page, elle est renvoyée vers une page d'erreur
			header('Location:/erreur_401');
		}
    }

}

?>
