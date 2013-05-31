<?php
namespace controller;

use dao\MysqlDao;

class affichageClientController{
    public function action(){
        $dao = new MysqlDao();
        $client = $dao->getInfosClientById($_POST['numclient']);
        include VIEW."displayClient.php";
    }
}
?>
