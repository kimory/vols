<?php

namespace controller;

if (!isset($_SESSION)) {
    session_start();
}

use dao\MysqlDao;

class passengerRegistrationController {

    public function action() {

		// On a déjà rempli le formulaire
		if(isset($_POST['civilite'], 
			$_POST['date_de_naissance'], 
			$_POST['nom'], 
			$_POST['prenom'],
			$_SESSION['nb_passagers']))
		{
			$i = $_SESSION['nb_passagers'];
			// On vérifie qu'on a rentré toutes les informations qu'il faut
			$i--;
                        $messages_erreur = array();
			while($i > 0)
                        // Cf le tableau des données que l'on récupère
                        // du formulaire commence à l'indice zéro
			{
				if(strlen($_POST['civilite'][$i]) == 0)
				{
//					// Pour le premier message d'erreur il faut initialiser la variable
//					if(! isset($_SESSION['message_erreur']))
//					{
//						$_SESSION['message_erreur'] = "";
//					}
					$messages_erreur[] = "Vous n'avez pas entré de civilité pour le passager $i.";
				}
				if(strlen($_POST['date_de_naissance'][$i]) == 0)
				{
					$messages_erreur[] = "Vous n'avez pas entré de date de naissance pour le passager $i.";
				}
				if(strlen($_POST['nom'][$i]) == 0)
				{
					$messages_erreur[] = "Vous n'avez pas entré de nom pour le passager $i.";
				}
				if(strlen($_POST['prenom'][$i]) == 0)
				{
					$messages_erreur[] = "Vous n'avez pas entré de prénom pour le passager $i.";
				}
				$i--;
			}

                        if(!empty($messages_erreur))
			{
                                //$_SESSION['messages_erreur'];
				include VIEW . "passengerRegistration.php";
				//unset($_SESSION['messages_erreur']);
			}
			else
			{
				echo "ALLER AILLEURS : tout est bon sur cette page on peut passer à la suivante";
			}
		}
		else if(!isset($_SESSION['nb_passagers']) || 
			strlen($_SESSION['nb_passagers']) == 0)
		{
            $_SESSION['message_nb_passagers'] = 'Vous devez renseigner un nombre de personnes.';
			echo "ALLER AILLEURS NB_PASSAGERS NOT SET";
		}
		else
		{
			include VIEW . "passengerRegistration.php";
		}
    }
}

?>
