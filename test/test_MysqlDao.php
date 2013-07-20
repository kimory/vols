<?php
include '../setup.php';
include DAO.'MysqlDao.php';
include ENTITY.'Client.php';

use dao\MysqlDao;
use entity\Client;

$dao = new MysqlDao();

//var_dump($dao->getInfosClientById('5'));
//var_dump($dao->getInfosPassagerById('2'));
//var_dump($dao->getPassagersEtPlacesByReservation('4'));

//var_dump($dao->getVolById('DF3'));
//var_dump($dao->getVolsByEmploye('H0002'));

//var_dump($dao->backOfficeLogin("admin", "admin"));

//$datedep = new DateTime(2013-12-01);
//var_dump($dao->getPropositions("Tokyo", "Doha", $datedep, 3, 2));
//var_dump($dao->getPropositions("Doha", "Tokyo", $datedep, 3, 2));
//$var_dump($dao->getPropositions("Berne", "Sydney", $datedep, 3, 2));

var_dump($dao->ajoutPassager('m', 'jean', 'jean', '2000-01-03'));
//var_dump($dao->ajoutClient('m', 'nom', 'prenom', 'adresse', 'cp', 
	//'ville', 'pays', 'mail', 'telFixe', 'telPortable', 'login', 'password'));
//$client = new Client(null, null, null, null, '250 rue Fr&eacute;d&eacute;ric', null, null, null, null, null, null, null, null);
//$client = new Client(null, null, null, null, '251 rue Frédéric', null, null, null, null, null, null, null, null);
//echo $client->getAdresse();
?>
