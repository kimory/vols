<?php

namespace controller;

if (!isset($_SESSION)) {
    session_start();
}

use dao\MysqlDao;

class affichageEmployeController {

    public function action() {
        $dao = new MysqlDao();
        if ($dao->isAdminConnected()) {
        // On n'exécute la fonction que si l'admin est connecté
            $message = null;
            // On vérifie qu'un numéro d'employé a été récupéré
            // Soit via le formulaire de recherche :
            if (isset($_POST['numemploye']) && strlen($_POST['numemploye']) != 0) {
                $numemploye = trim($_POST['numemploye']);
                // trim supprime les espaces éventuellement saisis par erreur
                // Soit par clic sur un lien :
            } elseif (isset($_GET['numemploye']) && strlen($_GET['numemploye']) != 0) {
                $numemploye = $_GET['numemploye'];
            }

            // Si on a récupéré un numéro d'employé, on exécute la fonction pour
            // récupérer les infos de l'employé :
            if (isset($numemploye) && strlen($numemploye) != 0) {
                $dao = new MysqlDao();
                $employe = $dao->getEmployeById($numemploye);
                if ($employe->getId() == null) {
                    // Cas d'un identifiant non valide (= l'employé n'existe pas en base) :
                    $message = 'L\'employé N°' . htmlentities($numemploye, ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
                }
            } else {
                // Cas du champ laissé vide dans le formulaire de recherche :
                $message = 'Vous devez saisir l\'identifiant d\'un employé pour
					obtenir sa description !';
            }
            include VIEW . "displayEmploye.php";
        } else {
            // Si la personne n'est pas connectée en tant qu'administrateur,
            // elle n'a pas à être sur cette page, elle est renvoyée vers une page d'erreur
            header('Location:/error2');
        }
    }

}

?>
