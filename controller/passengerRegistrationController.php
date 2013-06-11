<?php

namespace controller;

if (!isset($_SESSION)) {
    session_start();
}

use dao\MysqlDao;

class passengerRegistrationController {

    public function action() {

		if(!isset($_SESSION['nb_passagers']) || 
			strlen($_SESSION['nb_passagers']) == 0)
		{
            $_SESSION['message_nb_passagers'] = 'Vous devez renseigner un nombre de personnes.';
		}
		
		include VIEW . "passengerRegistration.php";
    }
}

?>
