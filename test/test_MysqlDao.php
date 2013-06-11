<?php
include '../setup.php';
include DAO.'MysqlDao.php';

use dao\MysqlDao;

$dao = new MysqlDao();

//var_dump($dao->getInfosClientById('CL025'));
//var_dump($dao->getInfosPassagerById('P0283'));
//var_dump($dao->getPassagersEtPlacesByReservation('RV014561AJ'));

//var_dump($dao->getPropositionsByVol('Paris', 'Saint-Martin','20-06-2013'));
//var_dump($dao->getVolById('DF5609'));
//var_dump($dao->getVolsByEmploye('H0011'));

//var_dump($dao->backOfficeLogin("general", "grneral"));

var_dump($dao->getPropositions("Berne", "Sydney", "2013-07-01", 3, 2));
//var_dump($dao->getPropositions("Berne", "Sydney", "2013-05-31", 3, 2));
//var_dump($dao->getPropositions("Berne", "Sydney", "2013-05-31", 170, 2));
?>
