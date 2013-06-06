<?php
namespace controller;

use dao\MysqlDao;

class affichageDesVolsController{
    public function action(){
        $message = null;
        
        // On vérifie qu'un numéro d'employé a bien été récupéré via l'URL     
        if(isset($_GET['numemploye']) && strlen($_GET['numemploye']) != 0){
            // On récupère la liste des vols sur lesquels l'employé travaille
            // sous forme de tableau d'objets Vol :
            $dao = new MysqlDao();
            $tab = $dao->getVolsByEmploye($_GET['numemploye']);
        }else {
            $message = 'Le numéro d\'employé n\'est pas valide...';
        }
        include VIEW."displayDesVols.php";
    }    
    
}
?>
