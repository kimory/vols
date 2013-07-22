<?php

namespace controller;

use dao\MysqlDao;

class affichageVolController {

    public function action() {
        $dao = new MysqlDao();
        if ($dao->isAdminConnected()) {
        // On n'exécute la fonction que si l'admin est connecté
            $message = null;
            // On vérifie qu'un numéro de vol a été récupéré
            // Soit via le formulaire de recherche :
            if (isset($_POST['numvol']) && strlen($_POST['numvol']) != 0) {
                $numvol = trim($_POST['numvol']);
                // trim supprime les espaces éventuellement saisis par erreur
                // Soit par clic sur un lien :
            } elseif (isset($_GET['numvol']) && strlen($_GET['numvol']) != 0) {
                $numvol = $_GET['numvol'];
            }

            // Si on a récupéré un numéro de vol, on exécute la fonction pour
            // récupérer les infos du vol :
            if (isset($numvol) && strlen($numvol) != 0) {
                $dao = new MysqlDao();
                $vol = $dao->getVolById($numvol);
                if ($vol->getNumvol() == null) {
                    // Cas d'un identifiant non valide (= le vol n'existe pas en base) :
                    $message = 'Le vol N°' . htmlentities($numvol, ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
                }
            } else {
                // Cas du champ laissé vide dans le formulaire de recherche :
                $message = 'Vous devez saisir l\'identifiant d\'un vol pour
					obtenir sa description !';
            }
            include VIEW . "displayVol.php";
        } else {
            // Si la personne n'est pas connectée en tant qu'administrateur,
            // elle n'a pas à être sur cette page, elle est renvoyée vers une page d'erreur
            header('Location:/error2');
        }
    }

}

?>
