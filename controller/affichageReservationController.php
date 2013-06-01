<?php
namespace controller;

use dao\MysqlDao;

class affichageReservationController{
    public function action(){
        $message = null;
        // On vérifie qu'un numéro de réservation a été saisi :
        if(isset($_POST['numreservation']) && strlen($_POST['numreservation']) != 0){
            $dao = new MysqlDao();
            $reservation = $dao->getInfosReservationById($_POST['numreservation']);
            if($reservation->getNumReservation() == null){
                // Cas d'un identifiant non valide (= la réservation n'existe pas en base) :
                $message = 'La réservation N°'. htmlentities($_POST['numreservation'], ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
            }
        }else {
            // Cas du champ laissé vide :
            $message = 'Vous devez saisir l\'identifiant d\'une réservation pour
                    obtenir sa description !';
        }
        include VIEW."displayReservation.php";
    }    
    
}
?>
