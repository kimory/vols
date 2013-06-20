<?php

namespace controller;

class ContactController {

    public function action() {

        $messages = array();
        // On initialise un tableau d'erreurs potentielles
        // On vérifie que les champs ont été correctement renseignés
        // htmlentities permet de convertir tous les caractères éligibles en entités HTML  
        // ENT_QUOTES permet de convertir les doubles quotes et simples quotes en entités HTML 
        if(!isset($_POST['nom']) || strlen($_POST['nom']) == 0 ){            
            $messages[] = "Merci d'indiquer votre nom.";         
        }elseif(!preg_match("/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ -]$/",$_POST['nom'])){
            $message[] = "Votre saisie du nom est incorrecte";         
        }else{
            $nom = htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8');
        }
             
        if(!isset($_POST['prenom']) || strlen($_POST['prenom']) == 0 ){
            $messages[] = "Merci d'indiquer votre prénom.";       
        }elseif(!preg_match("/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]$/",$_POST['prenom'])){
            $message[] = "Votre saisie du prénom est incorrecte"; 
        } else {            
            $prenom = htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8');           
        }
                
        if(isset($_POST['mail']) && strlen($_POST['mail']) > 0 && preg_match("/^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$/",$_POST['mail'])){
            $mail = htmlentities($_POST['mail'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Votre saisie du mail est incorrecte.";
        }
        
        if(!isset($_POST['sujet']) || strlen($_POST['sujet']) == 0) {
            $messages [] = "Merci d'indiquer votre sujet.";
        }elseif(!preg_match("/^[a-zA-Z0-9àáâãäåçèéêëìíîïðòóôõöùúûüýÿ -]+$/", $_POST['sujet'])){            
             $messages[] = "Votre saisie du sujet est incorrecte.";
        }else{           
            $sujet = htmlentities($_POST['sujet'], ENT_QUOTES, 'UTF-8');
        } 
        
        if(isset($_POST['telephone']) && preg_match("/^\+?[0-9]{8,20}$/",$_POST['telephone'])){
            $telephone = htmlentities($_POST['telephone'], ENT_QUOTES, 'UTF-8');

        } else {
            $messages[] = "Votre saisie du téléphone est incorrecte.";
        }
                
        if(isset($_POST['message']) && strlen($_POST['message']) > 0 ) {
            $message = htmlentities($_POST['message'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Votre saisie du message est incorrecte.";
        }
        
        if(empty($messages)){  
           include VIEW . "affichagecontact.php";
        }else{
            $_SESSION['messages'] = $messages;
            header('location:/contact');            
        }
        
       
        } 
}
?>
