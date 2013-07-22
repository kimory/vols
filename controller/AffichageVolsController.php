<?php

namespace controller;

use dao\MysqlDao;

class AffichageVolsController {

    public function action() {
        $dao = new MysqlDao();
        if ($dao->isAdminConnected()) {
        // On n'exécute la fonction que si l'admin est connecté
            $message = null;

            // On vérifie qu'un numéro d'employé a bien été récupéré via l'URL     
            if (isset($_GET['numemploye']) && strlen($_GET['numemploye']) != 0) {
                // On récupère la liste des vols sur lesquels l'employé travaille
                // sous forme de tableau d'objets Vol :
                $tab = $dao->getVolsByEmploye($_GET['numemploye']);

                // Cas d'un identifiant non valide
                // Si qqn touche à l'URL par exemple :
                if ($dao->getEmployeById($_GET['numemploye'])->getId() == null) {
                    // ci-dessus la méthode "getEmployeById" renvoie un objet Employé créé en fonction du
                    // numéro d'employé récupéré dans l'URL. On regarde si on peut récupérer son identifant.
                    // Si l'identifiant est null, cela veut dire que l'employé n'existe pas en base.
                    $message = 'L\'employé N°' . htmlentities($_GET['numemploye'], ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
                }
            } else {
                $message = 'Le numéro d\'employé n\'est pas valide...';
            }
            include VIEW . "bo_vols.php";
        } else {
            // Si la personne n'est pas connectée en tant qu'administrateur,
            // elle n'a pas à être sur cette page, elle est renvoyée vers une page d'erreur
            header('Location:/erreur_401');
        }
    }

}

?>
