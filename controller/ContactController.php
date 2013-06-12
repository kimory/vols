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
        if(isset($_POST['nom']) && strlen($_POST['nom']) > 0) {
            $nom = htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre nom.";
        }
        
        if(isset($_POST['prenom']) && strlen($_POST['prenom']) > 0) {
            $prenom = htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre prénom.";
        }
        // verifier aussi le caractere speciale de l'adresse mail
        
        if(isset($_POST['mail']) && strlen($_POST['mail']) > 0) {
            $mail = htmlentities($_POST['mail'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre E-mail.";
        }
        
        if(isset($_POST['sujet']) && strlen($_POST['sujet']) > 0) {
            $sujet = htmlentities($_POST['sujet'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre sujet.";
        }
        // verifier si le caractere saisie est bien celui d'un tel et qui peut etre verifier si c'est un numero internationale 
        if(isset($_POST['telephone']) && strlen($_POST['telephone']) > 0 && ctype_digit($_POST['telephone']) && preg_match("^\+|[0-9](10)$",$POST['telephone'])){
            $telephone = htmlentities($_POST['telephone'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre téléphone.";
        }
        // verifie si le respecte les bons caracteres d'un mail.        
        if(isset($_POST['message']) && strlen($_POST['message']) > 0 && preg_match("^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$",$_POST['message'])) {
            $message = htmlentities($_POST['message'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "Merci d'indiquer votre message.";
        }
        
        if(empty($messages)){
            header('location:/displaycontact');          
        }else{
            $_SESSION['messages'] = $messages;
            header('location:/contact');            
        }
        
       
        } 
}
?>
