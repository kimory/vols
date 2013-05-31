<?php
include '../setup.php';
include DAO.'MysqlDao.php';

use dao\MysqlDao;

$dao = new MysqlDao();

//var_dump($dao->getInfosClientById('CL025'));
var_dump($dao->getInfosPassagerById('P0283'));

?>
