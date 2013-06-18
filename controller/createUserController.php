<?php

namespace controller;

use dao\MysqlDao;

if (!isset($_SESSION)) {
	session_start();
}

class createUserController {

	public function action() {

		$_SESSION['inscription_civilite'] =		htmlentities($_POST['civilite'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_nom'] =			htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_prenom'] =		htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_adresse'] =		htmlentities($_POST['adresse'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_code_postal'] =	htmlentities($_POST['code_postal'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_ville'] =		htmlentities($_POST['ville'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_pays'] =			htmlentities($_POST['pays'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_email'] =		htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_telfixe'] =		htmlentities($_POST['telfixe'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_telportable'] =	htmlentities($_POST['telportable'], ENT_QUOTES, 'UTF-8');
		$_SESSION['inscription_login'] =		htmlentities($_POST['login'], ENT_QUOTES, 'UTF-8');

		$messages = array(); // On initialise un tableau d'erreurs potentielles

		if(!isset($_POST['civilite']) || strlen($_POST['civilite']) == 0 )
		{
			$messages[] = "Merci d'indiquer votre civilité.";
		}
		else if(strcmp($_POST['civilite'], 'm') != 0 && strcmp($_POST['civilite'], 'mme') != 0)
		{
			$messages[] = "Il y a un soucis dans la sélection de la civilité.";
		}
		else
		{
			$civilite = $_POST['civilite'];
		}


		// On vérifie que les champs ont été correctement renseignés
		if(!isset($_POST['nom']) || strlen($_POST['nom']) == 0 )
		{
			$messages[] = "Merci d'indiquer votre nom.";            
		}
		else if( ! preg_match("/^[a-zA-Z ]+$/", $_POST['nom']))
		{
			$messages[] = "Le nom saisi est incorrect.";
		}
		else
		{
			$nom = htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8');
		}

		if(!isset($_POST['prenom']) || strlen($_POST['prenom']) == 0 )
		{
			$messages[] = "Merci d'indiquer votre prénom.";
		}
		else if( ! preg_match("/^[a-zA-Z ]+$/", $_POST['prenom']))
		{
			$messages[] = "Le prénom saisi est incorrect.";
		}
		else
		{
			$prenom = htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8');           
		}

		if (isset($_POST['adresse']) && strlen($_POST['adresse']) > 0 &&
			preg_match("/^[A-Za-z0-9-., ]+$/", $_POST['adresse']))
		{
			$adresse = htmlentities($_POST['adresse'], ENT_QUOTES, 'UTF-8');
		} 
		else 
		{
			$messages[] = "L'adresse est incorrecte.";
		}

		if (isset($_POST['code_postal']) && strlen($_POST['code_postal']) > 0 &&
			preg_match("/^[0-9]{5}$/", $_POST['code_postal'])) 
		{
			$cp = htmlentities($_POST['code_postal'], ENT_QUOTES, 'UTF-8');
		} 
		else 
		{
			$messages[] = "Le code postal est incorrect.";
		}

		if (isset($_POST['ville']) && strlen($_POST['ville']) > 0 &&
			preg_match("/^[A-Za-z-]+$/", $_POST['ville'])) 
		{
			$ville = htmlentities($_POST['ville'], ENT_QUOTES, 'UTF-8');
		} 
		else 
		{
			$messages[] = "La ville est incorrecte.";
		}

		if (isset($_POST['pays']) && strlen($_POST['pays']) > 0 &&
			preg_match("/^[A-Za-z-]+$/", $_POST['pays'])) 
		{
			$pays = htmlentities($_POST['pays'], ENT_QUOTES, 'UTF-8');
		} 
		else 
		{
			$messages[] = "Le pays est incorrect.";
		}

		# la RFC prévoit des cas plus complexe que ça
		if(isset($_POST['email']) && strlen($_POST['email']) > 0 && 
			preg_match("/^[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", $_POST['email'])) 
		{
			$email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
		} 
		else 
		{
			$messages[] = "L'adresse mail est  incorrecte.";
		}

		if(isset($_POST['telfixe']) && preg_match("/^\+?[0-9]{10,20}$/",$_POST['telfixe']))
		{
			$telfixe = htmlentities($_POST['telfixe'], ENT_QUOTES, 'UTF-8');
		} 
		else 
		{
			$messages[] = "Le numéro de téléphone fixe est incorrect.";
		}

		if(isset($_POST['telportable']) && 
			preg_match("/^\+?[0-9]{10,20}$/", $_POST['telportable']))
		{
			$mobile = htmlentities($_POST['telportable'], ENT_QUOTES, 'UTF-8');
		} 
		else 
		{
			$messages[] = "Le numéro de téléphone portable est incorrect.";
		}

		if (isset($_POST['login']) && strlen($_POST['login']) > 0 &&
			preg_match("/^[A-Za-z0-9]+$/", $_POST['login'])) 
		{
			$login = htmlentities($_POST['login'], ENT_QUOTES, 'UTF-8');
		} 
		else 
		{
			$messages[] = "Le login est incorrect.";
		}

		if (isset($_POST['password1'], $_POST['password2']) && 
			strlen($_POST['password1']) > 0 &&
			strlen($_POST['password1']) == strlen($_POST['password2'])) 
		{
			if(strcmp($_POST['password1'], $_POST['password2']) == 0)
			{
				$password = htmlentities($_POST['password1'], ENT_QUOTES, 'UTF-8');
			}
			else
			{
				$messages[] = "Les mots de passe ne sont pas identiques.";
			}
		} 
		else 
		{
			$messages[] = "Le mot de passe est incorrect.";
		}

		if(empty($messages))
		{
			//header('location:/displaycontact');   
			//include VIEW . "confirmationinscription.php";;

			$dao = new MysqlDao();
			if(!$dao->ajoutClient($civilite, $nom, $prenom, $adresse, $cp, 
				$ville, $pays, $email, $telfixe, $mobile, $login, $password))
			{
				$_SESSION['messages'] = array();
				$_SESSION['messages'][] = "Nous avons eu un problème à l'ajout d'un client dans la base de données.";
			}
			else
			{

				// si la fonction ne retourne rien : erreur
				if(null == $dao->clientLogin($login, $password))
				{
					$_SESSION['messages'] = array();
					$_SESSION['messages'][] = "Impossible de se connecter avec vos identifiants.";
					header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédent          
				}
				else
				{
					// Si tout est ok, on enregistre le login et le password en session.
					$_SESSION['login'] = $login;
					$_SESSION['passwd'] = $password;

					// puis on va à la page précédent l'inscription
					// ou la page définie avant d'aller sur la page d'inscription
					header('Location:' . $_SESSION['pagesurlaquelleondoitaller']);
					unset($_SESSION['pagesurlaquelleondoitaller']);
					return;
				}
			}
		}
		else
		{
			$_SESSION['messages'] = $messages;
			header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédent          
		}

	}
}



?>
