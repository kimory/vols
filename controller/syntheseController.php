<?php

namespace controller;

use dao\MysqlDao;

if (!isset($_SESSION)) {
	session_start();
}

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
                                $_POST['moisexpiration'] > 0 && $_POST['moisexpiration'] < 13 &&
                                $_POST['anneeexpiration'] >= $anneCourante && $_POST['anneeexpiration'] <= $anneCourante + 5 &&
                                preg_match("/^[A-Za-z-]+$/", $_POST['nomporteur']) &&
                                preg_match("/^[0-9]{3}$/", $_POST['codesecurite'])){
                                
                                    // TODO
                                    // enregistrer les informations de la résa dans la BDD
                                    // passer à la vue suivante
                            } else {
                                    $_SESSION['message'] = "Les informations de paiement renseignées sont erronées !";
                                    header('Location:/synthese');
                            }
				

			}
                        // ici on fait la vérif la première fois qu'on arrive
                        // sur ce contrôleur :
			else if(isset(
				$_SESSION['volchoisi'],
				$_SESSION['passagers'],
				$_SESSION['nb_passagers']))
			{

				// getVolById renvoie un objet Vol
				$_SESSION['vol'] = $dao->getVolById($_SESSION['volchoisi']);
				include VIEW . "synthese.php";
			}
			else // il manque des informations, on repart sur la page "recherche"
			{
				// TODO
				// Vérifier que cette variable de session sera affichée dans la vue
                                $messages = array(); // cf la page recherche parcourt un tableau de messages
                                $messages[] = "Certaines informations sont manquantes !";
				$_SESSION['messages'] = $messages;
				header('Location:/recherche');
			}
		}
		else
		{
			// TODO
			// Vérifier que cette variable de session sera affichée dans la vue
                        $messages = array(); // cf la page recherche parcourt un tableau de messages
                                $messages[] = "Votre session a expiré ! Merci de recommencer votre recherche !";
				$_SESSION['messages'] = $messages;
				header('Location:/recherche');
		}
	}
}

?>
