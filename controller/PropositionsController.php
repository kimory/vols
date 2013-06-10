<?php

namespace controller;

session_start();

use dao\MysqlDao;

class PropositionsController{  
    public function action(){
        

        $messages = array();
        
        // on verifie si on a bien recuperer la ville de depart saisie par l'utilisateur
        //j'utilise la fonction "htmlspecialchars" qui  permet de rendre inoffensif les injections  html et qui les afficheras seulement." faille XSS" sur les formulaires.
        // on peut aussi mettre la fonction "strip_tags" qui permet de retirer les balises HTML que le visiteur a tenté d'envoyer plutôt que de les afficher
        
         if(isset($_POST['villedepart']) && strlen($_POST['villedepart'])!=0 && htmlspecialchars($_POST['villedepart'])){
             $villeDepart = trim($_POST['villedepart']);                  
        }else{              
             $messages[]="Veuillez indiquer la ville de départ";
             $villeDepart = NULL; 
        }         
         if(isset($_POST['villearrivee']) && strlen($_POST['villearrivee'])!=0 && htmlspecialchars($_POST['villearrivee'])){
              
             $villeArrivee = trim($_POST['villearrivee']);
         }else{
             $messages[]="Veuillez indiquer la ville d'arrivèe";
             $villeArrivee = NULL;
         }
          if ($vol->getLieuDepart() && $vol->getLieuArrivee()) {
              $diff = $vol->getLieuDepart()->diff($vol->getlieuArrivee());
              //$nbJours = $diff->format("%a");
         }
              
         if (isset($_POST['jour']) && ctype_digit($_POST['jour']) && $_POST['jour'] > 0 && $_POST['jour'] < 32 && htmlspecialchars($_POST['jour'])) {
             $jour = trim($_POST['jour']);
         } else {
             $jour = null;
             $messages[] = "Le jour est incorrect";
         }
         if (isset($_POST['mois']) && ctype_digit($_POST['mois']) && $_POST['mois'] > 0 && $_POST['mois'] < 13 && htmlspecialchars($_POST['mois'])) {
             $mois = trim($_POST['mois']); 
         } else {
             $mois = null;
             $messages[] = "Le mois est incorrect";
         }
         if (isset($_POST['annee']) && ctype_digit($_POST['annee']) && $_POST['annee'] == 2013 && $_POST['annee'] >= 2013 && htmlspecialchars($_POST['annee'])) {
             $annee = trim($_POST['annee']); 
         } else {
             $annee = null;
             $messages[] = "L'annee est incorrect";
         }
         
         if(isset($_POST['nbreadultes']) && ctype_digit($_POST['nbreadultes']) && htmlspecialchars($_POST['nbreadultes']) && $_POST['nbreadultes'] >=1 && $_POST['nbreadultes'] <= 30) {
             $nbreadultes = trim($_POST['nbreadultes']);
         }else {
             $message[] = "Veuillez renseigner le nombre d'adulte";
             $mois = null;
         }
          if(isset($_POST['nbreenfants']) && ctype_digit($_POST['nbreenfants']) &&  htmlspecialchars($_POST['nbreenfants']) && $_POST['nbreenfants'] >=0 && $_POST['nbreenfants'] <= 30){
             $nbreenfants = trim($_POST['nbreenfants']);
         }else {
             $message[] = "Veuillez renseigner le nombre d'enfants";
             $mois = null;
         }
         if(empty($messages)){
             include VIEW . "recherche.php";             
         }else{
             
         }
        
         
         
         
        
}
       

		$messages = array();

		// on vérifie si on a bien récupéré la ville de départ saisie par l'utilisateur

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

	}

}



?>
