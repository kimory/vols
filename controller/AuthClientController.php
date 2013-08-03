<?php

namespace controller;


use dao\MysqlDao;

class AuthClientController {

    public function action() {

        // On vérifie qu'un login et qu'un mot de passe ont été saisis
        if (isset($_POST['login']) && strlen($_POST['login']) != 0 &&
                isset($_POST['passwd']) && strlen($_POST['passwd']) != 0) {
            $login = trim($_POST['login']); // on enlève les espaces éventuellement saisis par erreur
            $passwd = $_POST['passwd'];
            $dao = new MysqlDao();
            $result = $dao->clientLogin($login, $passwd);

            if ($result == null) {
                $_SESSION['message_login_client'] = 'Le login et le mot de passe saisis n\'existent pas.';
                // On stocke 1 message d'erreur en session
                // et on renvoie vers la page précédente en cas d'erreur de saisie :
            } else {
                // Si tout est ok, on enregistre le login et le password en session.
                $_SESSION['login'] = $result[0];
                $_SESSION['passwd'] = $result[1];
            }
        } else {
            // On stocke 1 message d'erreur en session
            // et on renvoie vers la page précédente si le login et / ou le mot de passe ne sont pas renseignés :
            $_SESSION['message_login_client'] = 'Vous devez renseigner un login et un mot de passe.';
        }
        
        if(isset($_SESSION['message_login_client']) && strlen($_SESSION['message_login_client']) > 0)
        {
                header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente
        }
        elseif(! isset($_SESSION['pagesurlaquelleondoitaller'])){
                header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente
        }
        else
        {
                header('Location:' . $_SESSION['pagesurlaquelleondoitaller']);
        }
    }
}

?>
