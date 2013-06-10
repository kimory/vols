<?php

namespace controller;

session_start();

use dao\MysqlDao;

class affichageDesPassagersController {

    public function action() {
        $message = null;

        // On vérifie qu'un numéro de réservation a bien été récupéré via l'URL     
        if (isset($_GET['numreservation']) && strlen($_GET['numreservation']) != 0) {
            // On récupère les numéros des passagers et leurs places :
            $dao = new MysqlDao();
            $tab = $dao->getPassagersEtPlacesByReservation($_GET['numreservation']);

            // Cas d'un identifiant non valide
            // Si qqn touche à l'URL par exemple :
            if ($dao->getInfosReservationById($_GET['numreservation'])->getNumReservation() == null) {
                // ci-dessus la méthode "getInfosReservationById" renvoie un objet Reservation créé en fonction
                // du numéro de réservation récupéré dans l'URL. On regarde si on peut récupérer son identifant.
                // Si l'identifiant est null, cela veut dire que la réservation n'existe pas en base.
                $message = 'La réservation N°' . htmlentities($_GET['numreservation'], ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
            }
        } else {
            $message = 'Le numéro de réservation n\'est pas valide...';
        }
        include VIEW . "displayDesPassagers.php";
    }

}

?>
