<?php
include '../setup.php';
include DAO.'MysqlDao.php';

use dao\MysqlDao;

$dao = new MysqlDao();

var_dump($dao->getInfosClient('CL025'));

?>
