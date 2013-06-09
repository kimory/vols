<?php
namespace controller;

use dao\MysqlDao;

class PropositionsController{  
    public function action(){
        
		$messages = array();

		// on verifie si on a bien recuperer la ville de depart saisie par l'utilisateur

		if(!isset($_POST['villedepart']) || strlen($_POST['villedepart'])==0){
			$messages[]="Veuillez indiquer la ville de départ";
			$villedepart = NULL;                   
		}else{
			$villedepart = trim($_POST['villedepart']);            
		}         
		if(!isset($_POST['villearrivee']) || strlen($_POST['villearrivee'])==0){
			$messages[]="Veuillez indiquer la ville d'arrivèe";
			$villearrivee = NULL;           
		}else{
			$villearrivee = trim($_POST['villearrivee']);
		}
		if (isset($_POST['jour']) && ctype_digit($_POST['jour']) && $_POST['jour'] > 0 && $_POST['jour'] < 32) {
			$jour = $_POST['jour'];
		} else {
			$jour = null;
			$messages[] = "Le jour n'est pas indiqué";
		}
		if (isset($_POST['mois']) && ctype_digit($_POST['mois']) && $_POST['mois'] > 0 && $_POST['mois'] < 13) {
			$mois = $_POST['mois'];
		} else {
			$mois = null;
			$messages[] = "Le mois  n'est pas indiqué";
		}
		if (isset($_POST['annee']) && ctype_digit($_POST['annee'])) {
			$annee = $_POST['annee'];
		}else{
			$annee = NULL;
			$messages [] = "l'année  n'est pas indiquée";
		}
		if (isset($_POST['nbreadultes']) && ctype_digit($_POST['nbreadultes']) && $_POST['nbreadultes'] >= 1 && $_POST['nbreadultes'] < 30) {
			$nbreadultes = $_POST['nbreadultes'];
		} else {
			$nbreadultes = null;
			$messages[] = "Veuillez indiquer le nombre d'adultes";
		}

		$dao = new MysqlDao();
		$dao->backOfficeLogin($login, $passwd);


	}
}

?>
