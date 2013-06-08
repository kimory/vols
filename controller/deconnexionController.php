<?php

namespace controller;

session_start();

use dao\MysqlDao;

class deconnexionController {

    public function action() {
		session_destroy();
		header('Location:/recherche');
    }

}

?>
