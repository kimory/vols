<?php
namespace controller;

use dao\MysqlDao;

class affichagePassagerController{
    public function action(){
        $message = null;
        // On vérifie qu'un numéro de passager a été saisi :
        if(isset($_POST['numpassager']) && strlen($_POST['numpassager']) != 0){
            $dao = new MysqlDao();
            $passager = $dao->getInfosPassagerById($_POST['numpassager']);
            if($passager->getNumPassager() == null){
                // Cas d'un identifiant non valide (= le passager n'existe pas en base) :
                $message = 'Le passager N°'. htmlentities($_POST['numpassager'], ENT_QUOTES, 'UTF-8') . ' n\'existe pas !';
            }
        }else {
            // Cas du champ laissé vide :
            $message = 'Vous devez saisir l\'identifiant d\'un passager pour
                    obtenir sa description !';
        }
        include VIEW."displayPassager.php";
    }    
    
}
?>
