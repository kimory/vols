<?php

namespace controller;

use dao\MysqlDao;

class AffichagePassagerController {

    public function action() {
        $dao = new MysqlDao();
        if ($dao->adminEstConnecte()) {
        // On n'exécute la fonction que si l'admin est connecté
            $message = null;

            // On vérifie qu'un numéro de passager a été récupéré :
            // Soit via le formulaire de recherche :
            if (isset($_POST['numpassager']) && strlen($_POST['numpassager']) != 0) {
                $numpassager = trim($_POST['numpassager']);
                // trim supprime les espaces éventuellement saisis par erreur
                // Soit par clic sur un lien :
            } elseif (isset($_GET['numpassager']) && strlen($_GET['numpassager']) != 0) {
                $numpassager = $_GET['numpassager'];
            }

            // Si on a récupéré un numéro de passager, on exécute la fonction pour
            // récupérer les infos du passager :
            if (isset($numpassager) && strlen($numpassager) != 0) {
                $dao = new MysqlDao();
                $passager = $dao->getPassagerById($numpassager);
                if ($passager->getNumPassager() == null) {
                    // Cas d'un identifiant non valide (= le passager n'existe pas en base) :
                    $message = 'Le passager N°' . htmlentities($numpassager, ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
                }
            } else {
                // Cas du champ laissé vide :
                $message = 'Vous devez saisir l\'identifiant d\'un passager pour
					obtenir sa description !';
            }
            include VIEW . "bo_passager.php";
        } else {
            // Si la personne n'est pas connectée en tant qu'administrateur,
            // elle n'a pas à être sur cette page, elle est renvoyée vers une page d'erreur
            header('Location:/erreur_401');
        }
    }

}

?>
