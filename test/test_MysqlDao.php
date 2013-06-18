<?php
include '../setup.php';
include DAO.'MysqlDao.php';
include ENTITY.'Client.php';

use dao\MysqlDao;
use entity\Client;

$dao = new MysqlDao();

//var_dump($dao->getInfosClientById('CL025'));
//var_dump($dao->getInfosPassagerById('P0283'));
//var_dump($dao->getPassagersEtPlacesByReservation('RV014561AJ'));

//var_dump($dao->getPropositionsByVol('Paris', 'Saint-Martin','20-06-2013'));
//var_dump($dao->getVolById('DF5609'));
//var_dump($dao->getVolsByEmploye('H0011'));

//var_dump($dao->backOfficeLogin("general", "grneral"));

//var_dump($dao->getPropositions("Tokyo", "Doha", "2013-07-20", 3, 2));
//var_dump($dao->getPropositions("Doha", "Tokyo", "2013-07-12", 3, 2));
//var_dump($dao->getPropositions("Berne", "Sydney", "2013-07-01", 3, 2));
//var_dump($dao->getPropositions("Berne", "Sydney", "2013-05-31", 3, 2));
//var_dump($dao->getPropositions("Berne", "Sydney", "2013-05-31", 170, 2));


//var_dump($dao->ajoutPassager('m', 'jean', 'jean', '2000-01-03'));
//var_dump($dao->ajoutClient('m', 'nom', 'prenom', 'adresse', 'cp', 
	//'ville', 'pays', 'mail', 'telFixe', 'telPortable', 'login', 'password'));
$client = new Client(null, null, null, null, '18 rue Fr&eacute;d&eacute;ric', null, null, null, null, null, null, null, null);
echo $client->getAdresse();
?>
