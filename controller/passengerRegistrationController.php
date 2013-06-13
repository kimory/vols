<?php

namespace controller;

if (!isset($_SESSION)) {
    session_start();
}

use dao\MysqlDao;

class passengerRegistrationController {

    public function action() {
                // Cas où la personne n'a pas choisi un vol parmi les
                // propositions sur la vue précédente :
        
//                if(!$_POST['volchoisi'] || strlen($_POST['volchoisi']) == 0){
//                    $_SESSION['msg_vol_non_choisi'] = '.';
//                        header('Location:/recherche');
//                }
        
		// Cas où on a déjà rempli le formulaire d'inscription des passagers :
		if(isset($_POST['civilite'], 
			$_POST['date_de_naissance'], 
			$_POST['nom'], 
			$_POST['prenom'],
			$_SESSION['nb_passagers']))
		{
			// On vérifie qu'on a récupéré toutes les informations qu'il faut
			
			$i = 0;
                        // Cf le tableau des données que l'on récupère
			// du formulaire commence à l'indice zéro
                        
			$messages_erreur = array();
			
			while($i < $_SESSION['nb_passagers'])
			{
				if(strlen($_POST['civilite'][$i]) == 0 ||
                                  (!preg_match("/^(m|mme)$/", $_POST['civilite'][$i])))
				{
					$messages_erreur[] = "La civilité n'est pas correcte pour le passager " . ($i+1) . '.' ;
				} 
                                
				if(strlen($_POST['date_de_naissance'][$i]) == 0)
				{
					$messages_erreur[] = "Vous n'avez pas entré de date de naissance pour le passager " . ($i+1) . '.' ;
				}
                                
				if(strlen($_POST['nom'][$i]) == 0)
				{
					$messages_erreur[] = "Vous n'avez pas entré de nom pour le passager " . ($i+1) . '.' ;
				}
                                
				if(strlen($_POST['prenom'][$i]) == 0)
				{
					$messages_erreur[] = "Vous n'avez pas entré de prénom pour le passager " . ($i+1) . '.' ;
				}
                                
				$i++;
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
                        $_SESSION['message_nb_passagers'] = 'Désolés ! Il y a eu une erreur lors de l\'enregistrement des passagers.' .
                                PHP_EOL . 'Merci de recommencer en indiquant le nombre de voyageurs.';
                        header('Location:/recherche');
		}
		else
		{
			include VIEW . "passengerRegistration.php";
		}
	}
}

?>
