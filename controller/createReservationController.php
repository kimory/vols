<?php

namespace controller;

use dao\MysqlDao;

class CreateReservationController {

    public function action() {
        $dao = new MysqlDao();
        if ($dao->isClientConnected()) {
            // on vérifie au préalable que le client est bien connecté
            $login = $_SESSION['login'];
            $password = $_SESSION['passwd'];

            if (!$dao->ajoutReservation($client, $passager, $vol, $reservation, $prix)) {
                $_SESSION['messages'] = array();
                $_SESSION['messages'][] = "Nous avons eu un problème à l'ajout d'une réservation dans la base de données.";
                header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente
            }
        } else {
            $_SESSION['error_message'] = "Vous n'êtes pas connecté.";
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }

}

?>
