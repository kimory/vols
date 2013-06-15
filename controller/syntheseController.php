<?php

namespace controller;

if (!isset($_SESSION)) {
	session_start();
}

use dao\MysqlDao;
use entity\Client;
use entity\Passager;
use \DateTime;

class syntheseController {

	public function action() {
		// TODO
		// récupérer les informations nécessaires pour afficher la vue
		// À savoir : ville de départ et d'arrivée, les passagers
		// La date de départ
		//
		// Une fois que l'utilisateur entre ses coordonnées bancaires on
		// revient sur ce controlleur, et on vérifie qu'il a rentré
		// Son numéro de carte, son numéro de sécurité, 
		// La date d'expiration de sa carte, le nom du porteur

		$dao = new MysqlDao();
		if( $dao->isClientConnected() )
		{
			if(isset($_POST['numcarte'], 
				$_POST['moisexpiration'], 
				$_POST['anneeexpiration'], 
				$_POST['nomporteur'], 
				$_POST['codesecurite']))
			{

				// TODO
				// enregistrer les informations dans la base de donnée
				// passer à la vue suivante

			}
			else if(isset(
				$_SESSION['volchoisi'],
				$_SESSION['passagers'],
				$_SESSION['nb_passagers']))
			{

				// getVolById renvoie un objet Vol
				$vol = $dao->getVolById($_SESSION['volchoisi']);
				include VIEW . "synthese.php";
			}
			else // il manque des informations, on repart sur recherche
			{
				// TODO
				// Vérifier que cette variable de session sera affichée dans la vue
				$_SESSION['message'] = "Certaines informations sont manquantes !";
				header('Location:/recherche');
			}
		}
		else
		{
			// TODO
			// Vérifier que cette variable de session sera affichée dans la vue
			$_SESSION['message'] = "Certaines informations sont manquantes !";
			header('Location:/recherche');
		}
	}
}

?>
