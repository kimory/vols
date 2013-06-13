<?php

namespace controller;

if (!isset($_SESSION)) {
    session_start();
}

class ContactController {

    public function action() {

        $messages = array();
        // On initialise un tableau d'erreurs potentielles
        // On vérifie que les champs ont été correctement renseignés
        // htmlentities permet de convertir tous les caractères éligibles en entités HTML  
        // ENT_QUOTES permet de convertir les doubles quotes et simples quotes en entités HTML 
        if(!isset($_POST['nom']) || strlen($_POST['nom']) == 0 ){            
            $messages[] = "Merci d'indiquer votre nom.";            
        }elseif(ctype_digit($_POST['nom'])){
            $messages[] = "Votre saisie est incorrecte";
        }else{
            $nom = htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8');
        }       
             
        if(!isset($_POST['prenom']) || strlen($_POST['prenom']) == 0 ){
            $messages[] = "Merci d'indiquer votre prénom.";
        }elseif(ctype_digit($_POST['prenom'])){
            $messages[] = "Votre saisie est incorrecte";
        } else {            
            $prenom = htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8');           
        }
                
        if(isset($_POST['mail']) && strlen($_POST['mail']) > 0 && preg_match("/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/",$_POST['mail'])){
            $mail = htmlentities($_POST['mail'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre E-mail.";
        }
        
        if(isset($_POST['sujet']) && strlen($_POST['sujet']) > 0) {
            $sujet = htmlentities($_POST['sujet'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre sujet.";
        } 
        
        if(isset($_POST['tel']) && preg_match("/^[0-9]{10,20}$/",$_POST['tel'])){
            $telephone = htmlentities($_POST['tel'], ENT_QUOTES, 'UTF-8');

        } else {
            $messages[] = "Merci d'indiquer votre téléphone.";
        }
                
        if(isset($_POST['message']) && strlen($_POST['message']) > 0 ) {
            $message = htmlentities($_POST['message'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre message.";
        }
        
        if(empty($messages)){
            //header('location:/displaycontact');   
            include VIEW . "displaycontact.php";;
        }else{
            $_SESSION['messages'] = $messages;
            header('location:/contact');            
        }
        
       
        } 
}
?>
