<?php

namespace controller;

use dao\MysqlDao;

class AffichageReservationController {

    public function action() {
        $dao = new MysqlDao();
        if ($dao->adminEstConnecte()) {
        // On n'exécute la fonction que si l'admin est connecté
            $message = null;
            // On vérifie qu'un numéro de réservation a été récupéré :
            // Soit via le formulaire de recherche :
            if (isset($_POST['numreservation']) && strlen($_POST['numreservation']) != 0) {
                $numreservation = trim($_POST['numreservation']);
                // trim supprime les espaces éventuellement saisis par erreur
                // Soit par clic sur un lien :
            } elseif (isset($_GET['numreservation']) && strlen($_GET['numreservation']) != 0) {
                $numreservation = $_GET['numreservation'];
            }
            // Si on a récupéré un numéro de réservation, on exécute la fonction pour
            // récupérer les infos de la réservation :

            if (isset($numreservation) && strlen($numreservation) != 0) {
                $dao = new MysqlDao();
                $reservation = $dao->getReservationById($numreservation);
                if ($reservation->getNumReservation() == null) {
                    // Cas d'un identifiant non valide (= la réservation n'existe pas en base) :
                    $message = 'La réservation N°' . htmlentities($numreservation, ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
                }
            } else {
                // Cas du champ laissé vide :
                $message = 'Vous devez saisir l\'identifiant d\'une réservation pour
					obtenir sa description !';
            }
            include VIEW . "bo_reservation.php";
        } else {
            // Si la personne n'est pas connectée en tant qu'administrateur,
            // elle n'a pas à être sur cette page, elle est renvoyée vers une page d'erreur
            header('Location:/erreur_401');
        }
    }

}

?>
