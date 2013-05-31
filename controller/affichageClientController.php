<?php
namespace controller;

use dao\MysqlDao;

class affichageClientController{
    public function action(){
        $message = null;
        if(isset($_POST['numclient']) && strlen($_POST['numclient']) != 0){
            $dao = new MysqlDao();
            $client = $dao->getInfosClientById($_POST['numclient']);
        }else {
            $message ='Vous devez saisir l\'identifiant d\'un client pour
                    obtenir sa description !';
        }
        include VIEW."displayClient.php";
    }
    
    
}
?>
