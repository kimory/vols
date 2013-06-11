<?php

namespace controller;

use dao\MysqlDao;
use \DateTime;

if (!isset($_SESSION)) {
    session_start();
}

class PropositionsController {

    public function action() {

        $messages = array(); // On initialiser un tableau d'erreurs potentielles

        // On vérifie que les champs ont été correctement renseignés
        if (isset($_POST['villedepart']) && strlen($_POST['villedepart']) > 0) {
            $villedepart = htmlentities($_POST['villedepart'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "La ville de départ est incorrecte.";
        }
        
        if (isset($_POST['villearrivee']) && strlen($_POST['villearrivee']) > 0) {
            $villearrivee = htmlentities($_POST['villearrivee'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "La ville d'arrivée est incorrecte.";
        }

        if (isset($_POST['jour']) && ctype_digit($_POST['jour']) && $_POST['jour'] > 0 && $_POST['jour'] < 32) {
            $jour = trim($_POST['jour']);
        } else {
            $messages[] = "Le jour est incorrect.";
        }
        
        if (isset($_POST['mois']) && ctype_digit($_POST['mois']) && $_POST['mois'] > 0 && $_POST['mois'] < 13) {
            $mois = trim($_POST['mois']);
        } else {
            $messages[] = "Le mois est incorrect.";
        }
        
        $dt = new DateTime();
        $anneeCourante = $dt->format("Y"); // On récupère l'année courante
        if (isset($_POST['annee']) && ctype_digit($_POST['annee']) &&
        $_POST['annee'] = $anneeCourante || $_POST['annee'] = $anneeCourante + 1) {
            $annee = trim($_POST['annee']);
        } else {
            $messages[] = "L'année est incorrecte";
        }
        
        if(isset($jour) && isset($mois) && isset($annee)){
            $dt = new DateTime("$annee-$mois-$jour");
            $datedepart = $dt->format('Y-m-d');
        }

        // Il faut au minimum 1 adulte pour que la réservation puisse se faire :
        if (isset($_POST['nbreadultes']) && ctype_digit($_POST['nbreadultes']) && $_POST['nbreadultes'] >= 1) {
            $nbadultes = trim($_POST['nbreadultes']);
        } else {
            $messages[] = "Le nombre d'adultes est incorrect.";
        }
        
        if (isset($_POST['nbreenfants']) && ctype_digit($_POST['nbreenfants']) && $_POST['nbreenfants'] >= 0) {
            $nbenfants = trim($_POST['nbreenfants']);
        } else {
            $messages[] = "Le nombre d'enfants est incorrect.";
        }
        
        // Si le tableau de messages d'erreurs est vide, on récupère les vols susceptibles
        // de correspondre au choix du client
        if (empty($messages)) {
            $dao = new MysqlDao;
            $dao->getPropositions($villedepart, $villearrivee, $datedepart, $nbadultes, $nbenfants);
            
            //$_SESSION['vol_choisi'] = 
            $_SESSION['nb_passagers'] = $nbadultes + $nbenfants;
            header('Location:/Propositions');
        } else {
            $_SESSION['messages'] = $messages;
            header('Location:/Recherche');
        }
    }

}

?>
