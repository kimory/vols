<?php

namespace controller;

use dao\MysqlDao;

if (!isset($_SESSION)) {
    session_start();
}

class PropositionsController {

    public function action() {

        $messages = array();

        if (isset($_POST['villedepart']) && strlen($_POST['villedepart']) != 0) {
            $villeDepart = trim($_POST['villedepart']);
        } else {
            $messages[] = "La ville de départ est incorrecte.";
        }
        
        if (isset($_POST['villearrivee']) && strlen($_POST['villearrivee']) != 0) {
            $villeArrivee = trim($_POST['villearrivee']);
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
        $anneeCourante = $dt->format("Y");
        if (isset($_POST['annee']) && ctype_digit($_POST['annee']) &&
        $_POST['annee'] < $anneeCourante || $_POST['annee'] > $anneeCourante + 1) {
            $annee = null;
            $messages[] = "L'année est incorrecte";
        }

        if (isset($_POST['nbreadultes']) && ctype_digit($_POST['nbreadultes']) && $_POST['nbreadultes'] >= 1) {
            $nbadultes = trim($_POST['nbreadultes']);
        } else {
            $message[] = "Le nombre d'adultes est incorrect.";
        }
        if (isset($_POST['nbreenfants']) && ctype_digit($_POST['nbreenfants']) && $_POST['nbreenfants'] >= 0) {
            $nbenfants = trim($_POST['nbreenfants']);
        } else {
            $message[] = "Le nombre d'adultes est incorrect.";
        }
        if (empty($messages)) {
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
