<?php

namespace controller;

if (!isset($_SESSION)) {
    session_start();
}

use dao\MysqlDao;
use entity\Client;
use \DateTime;

class passengerRegistrationController {

    public function action() {
                // Cas où la personne n'a pas choisi un vol parmi les
                // propositions sur la vue précédente :
                if(isset($_POST['volchoisi']) && strlen($_POST['volchoisi']) > 0){
                    $_SESSION['volchoisi'] = $_POST['volchoisi'];
                }
        
                if(!isset($_SESSION['volchoisi']) || strlen($_SESSION['volchoisi']) == 0){
                    $_SESSION['msg_vol_non_choisi'] = 'Erreur : vous devez sélectionner un vol !';
                    header('Location:/propositions');
                }
        
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
                                  !preg_match("/^(m|mme)$/", $_POST['civilite'][$i]))
				{
					$messages_erreur[] = "La civilité n'est pas correcte pour le passager " . ($i+1) . '.' ;
				}                              
                                
				if(strlen($_POST['nom'][$i]) == 0 ||
                                  !preg_match("/^[A-Za-z-]+$/", $_POST['nom'][$i]))
				{
					$messages_erreur[] = "Le nom n'est pas correct pour le passager " . ($i+1) . '.' ;
				}
                                
				if(strlen($_POST['prenom'][$i]) == 0 ||
                                  !preg_match("/^[A-Za-z-]+$/", $_POST['prenom'][$i]))
				{
					$messages_erreur[] = "Le prénom n'est pas correct pour le passager " . ($i+1) . '.' ;
				}
                                
                                  if(strlen($_POST['date_de_naissance'][$i]) > 0 &&
                                          preg_match("/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/", $_POST['date_de_naissance'][$i])){
                                      $tab = explode('/',$_POST['date_de_naissance'][$i]); // On récupère les différents éléments de la date
                                      $jour = $tab[0];
                                      $mois = $tab[1];
                                      $annee = $tab[2];
                                      
                                      $datedujour = new DateTime(); // On récupère la date du jour
                                      $anneeCourante = $datedujour->format("Y"); // On récupère l'année courante
                                     
                                      // On vérifie que la date saisie est cohérente
                                      if($jour < 1 || $jour > 31 || $mois < 1 || $mois > 12 ||
                                              $annee < 1900 || $annee > $anneeCourante){
					$messages_erreur[] = "La date de naissance n'est pas correcte pour le passager " . ($i+1) . ".";
                                      }
                                  }
                                  else{
                                      $messages_erreur[] = "La date de naissance n'est pas correcte pour le passager " . ($i+1) . ". Veuillez respecter le format jj/mm/aaaa.";
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
				if(Client::isClientConnected())
					header('Location:');		// TODO renvoyer vers la page "récap + paiement"
				else
					header('Location:/clientConnection'); 
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
