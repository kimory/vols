<?php

namespace controller;



use dao\MysqlDao;

class AuthAdminController {

    public function action() {

		// On vérifie qu'un login et qu'un mot de passe ont été saisis
		if (isset($_POST['login_admin'], $_POST['passwd']) && 
			strlen($_POST['login_admin']) != 0 &&
			strlen($_POST['passwd']) != 0) {
				$login = trim($_POST['login_admin']);
				$passwd = $_POST['passwd'];
				$dao = new MysqlDao();
				$result = $dao->adminLogin($login, $passwd);

				if ($result == null) {
					$_SESSION['message_login_admin'] = 'Le login et le mot de passe saisis ne coïncident pas.';
					// On stocke 1 message d'erreur en session
					// et on renvoie vers la page précédente en cas d'erreur de saisie :
					header('Location:' . $_SERVER['HTTP_REFERER']);
				} else {
					// Si tout est ok, on enregistre le login et le password en session, et on envoie vers le back office.
					$_SESSION['login_admin'] = $result[0];
					$_SESSION['passwd'] = $result[1];
					header('Location:/bo_choix_critere');
				}
		} else {
			// On stocke 1 message d'erreur en session
			// et on renvoie vers la page précédente si le login et / ou le mot de passe ne sont pas renseignés :
			$_SESSION['message_login_admin'] = 'Vous devez renseigner un login et un mot de passe.';
			header('Location:' . $_SERVER['HTTP_REFERER']);
		}
	}

}

?>
