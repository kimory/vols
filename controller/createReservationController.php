<?php

namespace controller;

use dao\MysqlDao;

class CreateReservationController {

    public function action() {
        $dao = new MysqlDao();
        if ($dao->isClientConnected()) { // on vérifie au préalable que le client est bien connecté
            //header('location:/displaycontact');   
            //include VIEW . "confirmationinscription.php";;

            $dao = new MysqlDao();
            if (!$dao->ajoutReservation($date, $client)) {
                $_SESSION['messages'] = array();
                $_SESSION['messages'][] = "Nous avons eu un problème à l'ajout d'une réservation dans la base de données.";
            } else {

                // si la fonction ne retourne rien : erreur
                if (null == $dao->clientLogin($login, $password)) {
                    $_SESSION['messages'] = array();
                    $_SESSION['messages'][] = "Impossible de se connecter avec vos identifiants.";
                    header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente          
                } else {
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
                else {
                    $_SESSION['messages'] = $messages;
                    header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente          
                }
             else {
                $_SESSION['error_message'] = "Vous n'êtes pas connecté.";
                header('Location:' . $_SERVER['HTTP_REFERER']);
            }
        
    

?>
