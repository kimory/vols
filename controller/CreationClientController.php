<?php

namespace controller;

use dao\MysqlDao;

class CreationClientController {

    public function action() {

        $_SESSION['inscription_civilite'] = $_POST['civilite'];
        $_SESSION['inscription_nom'] = $_POST['nom'];
        $_SESSION['inscription_prenom'] = $_POST['prenom'];
        $_SESSION['inscription_adresse'] = $_POST['adresse'];
        $_SESSION['inscription_code_postal'] = $_POST['code_postal'];
        $_SESSION['inscription_ville'] = $_POST['ville'];
        $_SESSION['inscription_pays'] = $_POST['pays'];
        $_SESSION['inscription_email'] = $_POST['email'];
        $_SESSION['inscription_telfixe'] = $_POST['telfixe'];
        $_SESSION['inscription_telportable'] = $_POST['telportable'];
        $_SESSION['inscription_login'] = $_POST['login'];

        $messages = array(); // On initialise un tableau d'erreurs potentielles
        // On vérifie que les champs ont été correctement renseignés

        if (!isset($_POST['civilite']) || strlen($_POST['civilite']) == 0) {
            $messages[] = "Merci d'indiquer votre civilité.";
        } else if (strcmp($_POST['civilite'], 'm') != 0 && strcmp($_POST['civilite'], 'mme') != 0) {
            $messages[] = "Il y a un souci dans la sélection de la civilité.";
        } else {
            $civilite = $_POST['civilite'];
        }

        if (!isset($_POST['nom']) || strlen($_POST['nom']) == 0) {
            $messages[] = "Merci d'indiquer votre nom.";
        } else if (!preg_match("/^[a-zA-ZàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ' -]+$/", $_POST['nom'])) {
            $messages[] = "Le nom saisi est incorrect.";
        } else {
            $nom = $_POST['nom'];
        }

        if (!isset($_POST['prenom']) || strlen($_POST['prenom']) == 0) {
            $messages[] = "Merci d'indiquer votre prénom.";
        } else if (!preg_match("/^[a-zA-ZàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ' -]+$/", $_POST['prenom'])) {
            $messages[] = "Le prénom saisi est incorrect.";
        } else {
            $prenom = $_POST['prenom'];
        }

        if (isset($_POST['adresse']) && strlen($_POST['adresse']) > 0 &&
                preg_match("/^[A-Za-zàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ0-9.,' -]+$/", $_POST['adresse'])) {
            $adresse = $_POST['adresse'];
        } else {
            $messages[] = "L'adresse est incorrecte.";
        }

        if (isset($_POST['code_postal']) && strlen($_POST['code_postal']) > 0 &&
                preg_match("/^[a-zA-Z0-9]{3,}$/", $_POST['code_postal'])) {
            // On prévoit les codes postaux étrangers
            $cp = $_POST['code_postal'];
        } else {
            $messages[] = "Le code postal est incorrect.";
        }

        if (isset($_POST['ville']) && strlen($_POST['ville']) > 0 &&
                preg_match("/^[A-Za-zàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ' -]+$/", $_POST['ville'])) {
            $ville = $_POST['ville'];
        } else {
            $messages[] = "La ville est incorrecte.";
        }

        if (isset($_POST['pays']) && strlen($_POST['pays']) > 0 &&
                preg_match("/^[A-Za-zàâäéèêëìîïôöòùûüçÀÂÄÉÈËÏÎÌÔÖÙÛÜÇ-]+$/", $_POST['pays'])) {
            $pays = $_POST['pays'];
        } else {
            $messages[] = "Le pays est incorrect.";
        }

        if (isset($_POST['email']) && strlen($_POST['email']) > 0 &&
                preg_match("/^[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", $_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $messages[] = "L'adresse mail est incorrecte.";
        }

        if (isset($_POST['telfixe']) && preg_match("/^\+?[0-9]{8,20}$/", $_POST['telfixe'])) {
            $telfixe = $_POST['telfixe'];
        } else {
            $messages[] = "Le numéro de téléphone fixe est incorrect.";
        }

        if (isset($_POST['telportable']) &&
                preg_match("/^\+?[0-9]{8,20}$/", $_POST['telportable'])) {
            $mobile = $_POST['telportable'];
        } else {
            $messages[] = "Le numéro de téléphone portable est incorrect.";
        }

        if (isset($_POST['login']) && strlen($_POST['login']) > 0 &&
                preg_match("/^[A-Za-z0-9_]+$/", $_POST['login'])) {
            $login = $_POST['login'];
        } else {
            $messages[] = "Le login est incorrect.";
        }

        if (isset($_POST['password1'], $_POST['password2']) &&
                strlen($_POST['password1']) > 0 &&
                strlen($_POST['password1']) == strlen($_POST['password2'])) {
            if (strcmp($_POST['password1'], $_POST['password2']) == 0) {
                $password = $_POST['password1'];
            } else {
                $messages[] = "Les mots de passe ne sont pas identiques.";
            }
        } else {
            $messages[] = "Le mot de passe est incorrect.";
        }

        if (empty($messages)) {
            $dao = new MysqlDao();
            $ret = $dao->ajoutClient($civilite, $nom, $prenom, $adresse, $cp, $ville, $pays, $email, $telfixe, $mobile, $login, $password);


            if ($ret == 1) { // le login saisi existe déjà en base

                $_SESSION['messages'] = array();
                $_SESSION['messages'][] = "Le login choisi est déjà utilisé. Veuillez choisir un autre login !";
                header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente
            } else if ($ret == 2) { // problème d'insertion

                $_SESSION['messages'] = array();
                $_SESSION['messages'][] = "Nous avons eu un problème à l'ajout d'un client dans la base de données.";
                header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente
            } else {

                // si la fonction ne retourne rien : erreur
                if (null == $dao->clientLogin($login, $password)) {
                    $_SESSION['messages'] = array();
                    $_SESSION['messages'][] = "Impossible de se connecter avec vos identifiants.";
                    header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente          
                } else {
                    // Si tout est ok, on enregistre le login et le password chiffré en session.
                    $_SESSION['login'] = $login;
                    $_SESSION['passwd'] = crypt($password, '$5$ABCDEFGHIJKLM');

                    // puis on va à la page précédent l'inscription
                    // ou la page définie avant d'aller sur la page d'inscription
                    header('Location:' . $_SESSION['pagesurlaquelleondoitaller']);
                    unset($_SESSION['pagesurlaquelleondoitaller']);
                }
            }
        } else {
            $_SESSION['messages'] = $messages;
            header('Location:' . $_SERVER['HTTP_REFERER']); // renvoie vers la page précédente          
        }
    }

}

?>
