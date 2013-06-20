<?php

namespace controller;

use dao\MysqlDao;

class ContactController {

    public function action() {

        $messages = array();
        // On initialise un tableau d'erreurs potentielles
        // On vérifie que les champs ont été correctement renseignés
        // htmlentities permet de convertir tous les caractères éligibles en entités HTML  
        // ENT_QUOTES permet de convertir les doubles quotes et simples quotes en entités HTML 
        if(!isset($_POST['nom']) || strlen($_POST['nom']) == 0 ){            
            $messages[] = "Merci d'indiquer votre nom.";         
        }elseif(!preg_match("/^[ A-Za-zàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ-]+$/",$_POST['nom'])){
            $messages[] = "Votre saisie du nom est incorrecte.";         
        }else{
            $nom = $_POST['nom'];
        }
             
        if(!isset($_POST['prenom']) || strlen($_POST['prenom']) == 0 ){
            $messages[] = "Merci d'indiquer votre prénom.";       
        }elseif(!preg_match("/^[ A-Za-zàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ-]+$/",$_POST['prenom'])){
            $messages[] = "Votre saisie du prénom est incorrecte."; 
        } else {            
            $prenom = $_POST['prenom'];           
        }
                
        if(isset($_POST['mail']) && strlen($_POST['mail']) > 0 && preg_match("/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/",$_POST['mail'])){
            $mail = $_POST['mail'];
        } else {
            $messages[] = "Votre saisie du mail est incorrecte.";
        }
        
        if(!isset($_POST['sujet']) || strlen($_POST['sujet']) == 0) {
            $messages[] = "Merci d'indiquer votre sujet.";
        }elseif(!preg_match("/^[ A-Za-z0-9'àâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ-]+$/", $_POST['sujet'])){            
             $messages[] = "Votre saisie du sujet est incorrecte.";
        }else{           
            $sujet = $_POST['sujet'];
        } 
        
        if(isset($_POST['telephone']) && preg_match("/^\+?[0-9]{8,20}$/",$_POST['telephone'])){
            $telephone = $_POST['telephone'];

        } else {
            $messages[] = "Votre saisie du téléphone est incorrecte.";
        }
                
        if(isset($_POST['message']) && strlen($_POST['message']) > 0 ) {
            $message = $_POST['message'];
        } else {
            $messages[] = "Votre saisie du message est incorrecte.";
        }
        
        if(empty($messages)){  
            $dao = new MysqlDao();            
            $dao->addContact($nom, $prenom, $mail, $sujet, $telephone, $message);
           include VIEW . "affichagecontact.php";
        }else{
            if(isset($_POST['nom'])){
                $_SESSION['nom'] = $_POST['nom'];
            }
            if(isset($_POST['prenom'])){
                $_SESSION['prenom'] = $_POST['prenom'];
            }
            if(isset($_POST['mail'])){
                $_SESSION['mail'] = $_POST['mail'];
            }
            if(isset($_POST['sujet'])){
                $_SESSION['sujet'] = $_POST['sujet'];
            }
            if(isset($_POST['telephone'])){
                $_SESSION['telephone'] = $_POST['telephone'];
            }
            if(isset($_POST['message'])){
                $_SESSION['message'] = $_POST['message'];
            }
            $_SESSION['messages'] = $messages;
            header('location:/contact');            
        }      
        } 
}
?>
