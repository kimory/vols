<?php
namespace controller;
session_start();

use dao\MysqlDao;

class backOfficeLoginController {

    public function action() {

		// On vérifie qu'un login et qu'un mot de passe ont été saisis
		if ( isset($_POST['login']) && strlen($_POST['login']) != 0 && 
			isset($_POST['passwd']) && strlen($_POST['passwd']) != 0 ) {
            $login = trim($_POST['login']);
			$passwd = $_POST['passwd'];
            $dao = new MysqlDao();
            $res = $dao->backOfficeLogin($login, $passwd);

			if( sizeof($res) != 0) {
				$_SESSION['message'] = 'Le login et le mot de passe saisis ne coincident pas.';
				// renvoie vers la page précédente
				header('Location:' . $_SERVER['HTTP_REFERER']);
			}
			else {
				$_SESSION['login'] = $res[0];
				$_SESSION['passwd'] = $res[1];
				header('Location:/choixducritere');
			}
        }
		$_SESSION['message'] = 'Vous devez renseigner un login et un mot de passe.';
		// renvoie vers la page précédente
		header('Location:' . $_SERVER['HTTP_REFERER']);
	}

}

?>
