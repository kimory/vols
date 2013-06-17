<?php

namespace controller;

use dao\MysqlDao;

if (!isset($_SESSION)) {
    session_start();
}

class CreateUserController {

    public function inscription() {

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
        
        if (isset($_POST['adresse']) && strlen($_POST['adresse']) > 0 &&
            preg_match("/^[A-Za-z-]+$/", $_POST['adresse'])) {
            $adresse = htmlentities($_POST['adresse'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "L'adresse est incorrecte.";
        }
        
        if (isset($_POST['cp']) && strlen($_POST['cp']) > 0 &&
            preg_match("/^[A-Za-z-][0-9]+$/", $_POST['cp'])) {
            $cp = htmlentities($_POST['cp'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Le code postal est incorrect.";
        }
        
        if (isset($_POST['ville']) && strlen($_POST['ville']) > 0 &&
            preg_match("/^[A-Za-z-]+$/", $_POST['ville'])) {
            $ville = htmlentities($_POST['ville'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "La ville est incorrecte.";
        }
        
        if (isset($_POST['pays']) && strlen($_POST['pays']) > 0 &&
            preg_match("/^[A-Za-z-]+$/", $_POST['pays'])) {
            $pays = htmlentities($_POST['pays'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Le pays est incorrect.";
        }
        
        if(isset($_POST['mail']) && strlen($_POST['mail']) > 0 && preg_match("/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/",$_POST['mail'])){
            $mail = htmlentities($_POST['mail'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "L'adresse mail est  incorrecte.";
        }
        
       if(isset($_POST['telfixe']) && preg_match("/^+?[0-9]{10,20}$/",$_POST['telfixe'])){
            $telfixe = htmlentities($_POST['telfixe'], ENT_QUOTES, 'UTF-8');

        } else {
            $messages[] = "Le numéro de téléphone fixe est incorrect.";
        }
        
        if(isset($_POST['mobile']) && preg_match("/^+?[0-9]{10,20}$/",$_POST['mobile'])){
            $mobile = htmlentities($_POST['mobile'], ENT_QUOTES, 'UTF-8');

        } else {
            $messages[] = "Le numéro de téléphone portable est incorrect.";
        }
        // On vérifie que les numéro de téléphone fixe et portable saisis ne sont pas les mêmes :
        if (isset($_POST['telfixe']) && isset($_POST['mobile']) &&
            $_POST['telfixe'] == $_POST['mobile']){
            $messages[] = "Les numéros de téléphone fixe et portable ne doivent pas être identiques.";
        }     
        
        if (isset($_POST['login']) && strlen($_POST['login']) > 0 &&
            preg_match("/^[A-Za-z-][0-9]+$/", $_POST['login'])) {
            $login = htmlentities($_POST['login'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Le login est incorrect.";
        }
        
        if (isset($_POST['password']) && strlen($_POST['password']) > 0 &&
            preg_match("/^[A-Za-z-][0-9]+$/", $_POST['password'])) {
            $cp = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Le mot de passe est incorrect.";
        }
        
         if (isset($_POST['password']) && strlen($_POST['password']) > 0 &&
            preg_match("/^[A-Za-z-][0-9]+$/", $_POST['password'])) {
            $cp = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Le mot de passe est incorrect.";
        }
        
       if(empty($messages)){
            //header('location:/displaycontact');   
            include VIEW . "confirmationinscription.php";;
        }else{
            $_SESSION['messages'] = $messages;
            header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédent          
        }
        
        }
    }



?>
