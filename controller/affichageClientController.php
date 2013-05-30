<?php
namespace controller;

use dao\MysqlDao;

class affichageClientController{
    public function action(){
        $dao = new MysqlDao();
        $client = $dao->getInfosClient($_POST['numclient']);
        include VIEW."displayClient.php";
    }
}
?>
