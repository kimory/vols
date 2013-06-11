<?php

namespace controller;

use dao\MysqlDao;

if (!isset($_SESSION)) {
    session_start();
}




class PropositionsController{ 
    
    public function action(){
                

        $messages = array();
        
        
        // on verifie si on a bien recuperer la ville de depart saisie par l'utilisateur        
        
        
         if(isset($_POST['villedepart']) && strlen($_POST['villedepart'])!=0 ){
             $villeDepart = trim($_POST['villedepart']);                  
        }else{              
             $messages[]=" Veuillez indiquer la ville de départ";
             $villeDepart = NULL; 
        }         
         if(isset($_POST['villearrivee']) && strlen($_POST['villearrivee'])!=0 ){
              
             $villeArrivee = trim($_POST['villearrivee']);
         }else{
             $messages[]=" Veuillez indiquer la ville d'arrivèe";
             $villeArrivee = NULL;
         }            
        
         if (isset($_POST['jour']) && ctype_digit($_POST['jour']) && $_POST['jour'] > 0 && $_POST['jour'] < 32 && htmlspecialchars($_POST['jour'])) {
             $jour = trim($_POST['jour']);
         } else {
             $jour = null;
             $messages[] = "Le jour est incorrect";
         }
         if (isset($_POST['mois']) && ctype_digit($_POST['mois']) && $_POST['mois'] > 0 
                 && $_POST['mois'] < 13 && htmlspecialchars($_POST['mois'])) {
             $mois = trim($_POST['mois']); 
         } else {
             $mois = null;
             $messages[] = "Le mois est incorrect";
         }
         if (isset($_POST['annee']) && ctype_digit($_POST['annee']) &&
                 $_POST['annee'] == 2013 && $_POST['annee'] >= 2013 ) {
             $annee = trim($_POST['annee']); 
         } else {
             $annee = null;
             $messages[] = "L'annee est incorrect";
         }
         // ici, il faudra cree un objet datatime.
         
         $datedep = new \DateTime("$annee-$mois-$jour");
         $date_dep_au_bon_format = $datedep->format('Y-m-d');
        
         
         if(isset($_POST['nbreadultes']) && ctype_digit($_POST['nbreadultes'])
                 && htmlspecialchars($_POST['nbreadultes']) && $_POST['nbreadultes'] >=1 
                 && $_POST['nbreadultes'] <= 30) {
             $nbreadultes = trim($_POST['nbreadultes']);
         }else {
             $message[] = "Veuillez renseigner le nombre d'adulte";
             $mois = null;
         }
          if(isset($_POST['nbreenfants']) && ctype_digit($_POST['nbreenfants']) 
                  &&  htmlspecialchars($_POST['nbreenfants']) && $_POST['nbreenfants'] >=0 
                  && $_POST['nbreenfants'] <= 30){
             $nbreenfants = trim($_POST['nbreenfants']);
         }else {
             $message[] = "Veuillez renseigner le nombre d'enfants";
             $mois = null;
         }
          if(isset($villeDepart) && strlen($villeDepart)!=0 && isset($villeArrivee) && strlen($villeArrivee)!=0){
             $dao = new MysqlDao();
             $recherche = $dao->getPropositions($villeDepart, $villeArrivee, $date_dep_au_bon_format, $nbreadultes, $nbreenfants);
         }else{
             
         }
         
         if(empty($messages)){
             include VIEW . "propositions.php"; 
             
         }else{
              $_SESSION['messages'] = $messages;
              include VIEW . "recherche.php"; 
         }  
        
}
}


?>
