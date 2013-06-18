<?php

namespace controller;

use dao\MysqlDao;

class CreatePassagerController {

    public function action() {

        $messages = array(); // On initialise un tableau d'erreurs potentielles
        // On vérifie que les champs ont été correctement renseignés
        if(!isset($_POST['nom']) || strlen($_POST['nom']) == 0 ){            
            $messages[] = "Merci d'indiquer votre nom.";            
        }elseif(ctype_digit($_POST['nom'])){
            $messages[] = "Le nom saisi est incorrecte.";
        }else{
            $nom = htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8');
        }       
             
        if(!isset($_POST['prenom']) || strlen($_POST['prenom']) == 0 ){
            $messages[] = "Merci d'indiquer votre prénom.";
        }elseif(ctype_digit($_POST['prenom'])){
            $messages[] = "Le prénom saisi est incorrecte.";
        } else {            
            $prenom = htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8');           
        }
         if (isset($_POST['jour']) && ctype_digit($_POST['jour']) && $_POST['jour'] > 0 && $_POST['jour'] <= 31) {
            $jour = trim($_POST['jour']);
        } else {
            $messages[] = "Le jour est incorrect.";
        }

        if (isset($_POST['mois']) && ctype_digit($_POST['mois']) && $_POST['mois'] > 0 && $_POST['mois'] <= 12) {
            $mois = trim($_POST['mois']);
        } else {
            $messages[] = "Le mois est incorrect.";
        }

        if (isset($_POST['annee']) && ctype_digit($_POST['annee'])) {
            $mois = trim($_POST['mois']);
        } else {
            $messages[] = "L'année mois est incorrect.";
        }
           
       if(empty($messages)){
            //header('location:/displaycontact');   
            include VIEW . "#";;
        }else{
            $_SESSION['messages'] = $messages;
            header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédent          
        }
        
        }
    }



?>
