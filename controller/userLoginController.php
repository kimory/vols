<?php

namespace controller;

session_start();

use dao\MysqlDao;

class userLoginController {

    public function action() {

        // On vérifie qu'un login et qu'un mot de passe ont été saisis
        if (isset($_POST['login']) && strlen($_POST['login']) != 0 &&
                isset($_POST['passwd']) && strlen($_POST['passwd']) != 0) {
            $login = trim($_POST['login']);
            $passwd = $_POST['passwd'];
            $dao = new MysqlDao();
            $res = null;
            $res = $dao->userLogin($login, $passwd);

            if ($res == null) {
                $_SESSION['message'] = 'Le login et le mot de passe saisis ne coïncident pas.';
                // On stocke 1 message d'erreur en session
                // et on renvoie vers la page précédente en cas d'erreur de saisie :
            } else {
                // Si tout est ok, on enregistre le login et le password en session, et on envoie vers le back office.
                $_SESSION['login'] = $res[0];
                $_SESSION['passwd'] = $res[1];
            }
        } else {
            // On stocke 1 message d'erreur en session
            // et on renvoie vers la page précédente si le login et / ou le mot de passe ne sont pas renseignés :
            $_SESSION['message'] = 'Vous devez renseigner un login et un mot de passe.';
        }
		header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}

?>
