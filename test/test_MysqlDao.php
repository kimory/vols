<?php
include '../setup.php';
include DAO.'MysqlDao.php';

use dao\MysqlDao;

$dao = new MysqlDao();

//var_dump($dao->getInfosClientById('CL025'));
//var_dump($dao->getInfosPassagerById('P0283'));
//var_dump($dao->getPassagersEtPlacesByReservation('RV014561AJ'));

//var_dump($dao->getRecherche('Paris - France', 'Guadeloupe', '2013-06-20', 3, 2));
var_dump($dao->getVolById('DF5609'));

?>
