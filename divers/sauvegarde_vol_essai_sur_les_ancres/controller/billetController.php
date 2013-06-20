<?php

namespace controller;

use dao\MysqlDao;
//use \DateTime;

class billetController {

	public function action() {
		$dao = new MysqlDao();
		if( $dao->isClientConnected() && isset($_SESSION['numreservation']) )
		{
			$resultat = $dao->getInfoBillet($_SESSION['numreservation']);
			// si on a bien reçu le tableau d'informations
			if(sizeof($resultat) > 1)
			{
				include VIEW . "billet.php";
			}
			else
			{
				if($resultat == 1)
					$message = "Nous n'avons pas trouvé de passager.";
				else if($resultat == 2)
					$message = "Nous n'avons pas trouvé d'informations sur le vol.";

				include VIEW . "billet.php";
			}
		}
		else
		{
			$messages = array(); // cf sur la page recherche, on parcourt un tableau de messages
			$messages[] = "Votre session a expiré ! Merci de recommencer votre recherche !";
			$_SESSION['messages'] = $messages;
			header('Location:/recherche');
		}
	}
}

?>
