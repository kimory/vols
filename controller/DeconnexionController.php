<?php

namespace controller;

use dao\MysqlDao;

class DeconnexionController {

    public function action() {
        // On détruit les variables en session et on renvoie vers la page de recherche d'un vol
        session_destroy();
        header('Location:/recherche');
    }

}

?>
