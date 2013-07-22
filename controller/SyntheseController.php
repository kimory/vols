<?php

namespace controller;

use dao\MysqlDao;
use \DateTime;

class SyntheseController {

	public function action() {
		$dao = new MysqlDao();
		if( $dao->isClientConnected() )
		{
			// ici on revient sur ce contrôleur pour la seconde fois (ce qui voudra dire qu'on
			// a bien récupéré les données correctes en session auparavant.
			// Sinon, le client aurait été redirigé vers une page précédente.)
			// On vérifie les données de paiement :
			if(isset($_POST['numcarte'], 
				$_POST['moisexpiration'], 
				$_POST['anneeexpiration'], 
				$_POST['nomporteur'], 
				$_POST['codesecurite']))
			{
				// On vérifie que les champs sont corrects
				// Évidemment, il ne s'agit pas ici d'un vrai paiement en ligne, 
				// les vérifications sont donc succintes.

				// On récupère la date du jour et l'année courante
				$datedujour = new DateTime();
				$anneeCourante = $datedujour->format("Y");

				if(ctype_digit($_POST['numcarte']) &&
					ctype_digit($_POST['moisexpiration']) &&
					$_POST['moisexpiration'] > 0 && 
					$_POST['moisexpiration'] < 13 &&
					$_POST['anneeexpiration'] >= $anneeCourante && 
					$_POST['anneeexpiration'] <= $anneeCourante + 5 &&
					preg_match("/^[ A-Za-z-]+$/", $_POST['nomporteur']) &&
					preg_match("/^[0-9]{3}$/", $_POST['codesecurite']))
				{

					// on y mettra le numéro de réservation calculé
                                        // (cf il est passé par référence en paramètre
                                        // de "ajoutReservation").                                      
					$numreservation = '';
					$ret = $dao->ajoutReservation($_SESSION['login'], 
						$_SESSION['passagers'], 
						$_SESSION['volchoisi'],
						$numreservation);

                                        // Le numéro de réservation a été passé par référence
                                        // en paramètre de "ajoutReservation".
                                        // $numreservation aura donc été modifié.
					$_SESSION['numreservation'] = $numreservation;

					switch($ret)
					{
						case 0 : // Tout s'est bien passé, on passe à la vue suivante :
							header('Location:/BilletController');
							break;
						case 1 :
							$_SESSION['message'] = "Le client actuel n'existe pas.";
							include VIEW . "synthese.php";
							break;
						case 2 :
							$_SESSION['message'] = "Impossible d'entrer une nouvelle réservation.";
							include VIEW . "synthese.php";
							break;
						case 3 :
							$_SESSION['message'] = "Impossible d'insérer un nouveau passager.";
							include VIEW . "synthese.php";
							break;
						case 4 :
                                                        // A priori on ne devrait jamais avoir cette erreur...
							$_SESSION['message'] = "Après insertion d'un passager, nous ne le retrouvons plus dans la base.";
							include VIEW . "synthese.php";
							break;
						case 5 :
							$_SESSION['message'] = "Impossible d'insérer une place.";
							include VIEW . "synthese.php";
							break;
						default :
							$_SESSION['message'] = "Erreur lors de l'ajout d'une réservation dans la base de données.";
							include VIEW . "synthese.php";
							break;
					}
					
				} 
				else 
				{
					$_SESSION['message'] = "Les informations de paiement renseignées sont erronées !";
					include VIEW . "synthese.php";
				}


			}
			// ici on fait la vérif la première fois qu'on arrive
			// sur ce contrôleur :
			else if(isset($_SESSION['volchoisi']) &&
				isset($_SESSION['volchoisi']) &&
				isset($_SESSION['passagers']) &&
				isset($_SESSION['nb_passagers']) &&
				isset($_SESSION['nb_adultes']) &&
				isset($_SESSION['nb_enfants']))
			{

				// getVolById renvoie un objet Vol
				$_SESSION['vol'] = $dao->getVolById($_SESSION['volchoisi']);
				$_SESSION['tarif'] = ($_SESSION['vol']->getTarif() * $_SESSION['nb_adultes']) + (50 * $_SESSION['nb_enfants']);
				include VIEW . "synthese.php";

			}
			else // il manque des informations, on repart sur la page "recherche"
			{

				$messages = array(); // cf sur la page recherche, on parcourt un tableau de messages
				$messages[] = "Certaines informations sont manquantes !";
				$_SESSION['messages'] = $messages;
				header('Location:/recherche');

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
