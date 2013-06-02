<?php
namespace controller;

use dao\MysqlDao;

class affichageDesPassagersController{
    public function action(){
        $message = null;
        
        // On vérifie qu'un numéro de réservation a bien été récupéré via l'URL     
        if(isset($_GET['numreservation']) && strlen($_GET['numreservation']) != 0){
            // On récupère les numéros des passagers et leurs places :
            $dao = new MysqlDao();
            $tab = $dao->getPassagersEtPlacesByReservation($_GET['numreservation']);
        }else {
            $message = 'Le numéro de réservation n\'est pas valide...';
        }
        include VIEW."displayDesPassagers.php";
    }    
    
}
?>
