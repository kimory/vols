<?php

namespace controller;

use dao\MysqlDao;

class affichageReservationController {

    public function action() {
        $message = null;
        // On vérifie qu'un numéro de réservation a été récupéré :
        // Soit via le formulaire de recherche :
        if (isset($_POST['numreservation']) && strlen($_POST['numreservation']) != 0) {
            $numreservation = $_POST['numreservation'];

            // Soit par clic sur un lien :
        } elseif (isset($_GET['numreservation']) && strlen($_GET['numreservation']) != 0) {
            $numreservation = $_GET['numreservation'];
        }
        // Si on a récupéré un numéro de client, on exécute la fonction pour
        // récupérer les infos du client :

        if (isset($numreservation) && strlen($numreservation) != 0) {
            $dao = new MysqlDao();
            $reservation = $dao->getInfosReservationById($numreservation);
            if ($reservation->getNumReservation() == null) {
                // Cas d'un identifiant non valide (= la réservation n'existe pas en base) :
                $message = 'La réservation N°' . htmlentities($numreservation, ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
            }
        } else {
            // Cas du champ laissé vide :
            $message = 'Vous devez saisir l\'identifiant d\'une réservation pour
                    obtenir sa description !';
        }
        include VIEW . "displayReservation.php";
    }

}

?>
