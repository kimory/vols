<?php

namespace controller;

use dao\MysqlDao;
use \DateTime;

if (!isset($_SESSION)) {
    session_start();
}

class PropositionsController {

    public function action() {

        $messages = array(); // On initialise un tableau d'erreurs potentielles
        // On vérifie que les champs ont été correctement renseignés
        if (isset($_POST['villedepart']) && strlen($_POST['villedepart']) > 0 &&
                preg_match("/^[A-Z]?[a-z]+$/", $_POST['villedepart'])) {
            $villedepart = htmlentities($_POST['villedepart'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "La ville de départ est incorrecte.";
        }

        if (isset($_POST['villearrivee']) && strlen($_POST['villearrivee']) > 0 &&
            preg_match("/^[A-Z]?[a-z]+$/", $_POST['villearrivee'])) {
            $villearrivee = htmlentities($_POST['villearrivee'], ENT_QUOTES, 'UTF-8');
        } else {
            $messages[] = "La ville d'arrivée est incorrecte.";
        }
        
//        if (isset($_POST['villedepart']) && isset($_POST['villearrivee']) &&
//            $_POST['villedepart'] =! $_POST['villearrivee']){
//            
//        }
        

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

        $datedujour = new DateTime(); // On récupère la date du jour
        $anneeCourante = $datedujour->format("Y"); // On récupère l'année courante
        if (isset($_POST['annee']) && ctype_digit($_POST['annee']) &&
                ($_POST['annee'] == $anneeCourante || $_POST['annee'] == $anneeCourante + 1)) {
            $annee = trim($_POST['annee']);
        } else {
            $messages[] = "L'année est incorrecte";
        }

        if (isset($jour) && isset($mois) && isset($annee)) {
            $datedepartsouhaitee = "$jour/$mois/$annee";
            // La date sous forme de chaine de caractères servira uniquement pour l'affichage
            // (cf on ne manipule pas la date souhaitée initialement qui n'est qu'une indication)
        }

        // L'utilisateur ne doit pas indiquer une date antérieure à aujourd'hui :
        if (isset($jour, $mois, $annee, $datedujour)) {
            $date = "$jour/$mois/$annee";
            $dt = DateTime::createFromFormat('d/m/Y', $date);
            if ($dt < $datedujour) {
                $messages[] = "La date saisie est incorrecte.";
            } else {
                $datedepart = $dt;
            }
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
        // de correspondre à la demande du client
        if (empty($messages)) {
            $dao = new MysqlDao;
            // !! Nous rentrons en paramètre de cette fonction un objet DateTime ($datedepart)
            $vols = $dao->getPropositions($villedepart, $villearrivee, $datedepart, $nbadultes, $nbenfants);

            if (sizeof($vols) == 0) {
                // Cas où aucun vol ne correspond à la demande du client
                $messages[] = "Navrés ! Aucun vol ne correspond à votre demande. Vous pouvez effectuer une nouvelle recherche.";
                $_SESSION['messages'] = $messages;
                header('Location:/recherche');
            } else {
                // Je stocke en session les éléments à conserver et j'envoie vers la vue Proposition
                $_SESSION['vols'] = $vols; // un tableau d'objets Vol
                $_SESSION['nb_passagers'] = $nbadultes + $nbenfants;
                $_SESSION['date_depart_souhaitee'] = $datedepartsouhaitee;
                header('Location:/propositions');
            }
        } else {
            // S'il y a des erreurs, l'utilisateur est redirigé vers le formulaire de recherche
            // sur lequel les erreurs seront affichées.
            $_SESSION['messages'] = $messages;
            header('Location:/recherche');
        }
    }

}

?>
