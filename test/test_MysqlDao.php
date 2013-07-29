<?php
include '../setup.php';
include DAO.'MysqlDao.php';
include ENTITY.'Client.php';
include ENTITY.'Passager.php';

use dao\MysqlDao;
use entity\Client;
use entity\Passager;

$dao = new MysqlDao();

//var_dump($dao->getClientById('5'));
//var_dump($dao->getPassagerById('2'));
//var_dump($dao->getPassagersEtPlacesByNumresa('4'));

//var_dump($dao->getVolById('DF3'));
//var_dump($dao->getVolsByNumemploye('P0003'));

//var_dump($dao->getEmployeById('H0002'));

//var_dump($dao->getReservationById('3'));

//var_dump($dao->adminLogin("admin", "admin"));
//var_dump($dao->clientLogin("isabella", "taylor"));

//$datedep = new DateTime(2013-12-01);
//var_dump($dao->getPropositions("Tokyo", "Doha", $datedep, 3, 2));
//var_dump($dao->getPropositions("Doha", "Tokyo", $datedep, 3, 2));
//var_dump($dao->getPropositions("Berne", "Sydney", $datedep, 3, 2));

//var_dump($dao->ajoutClient("M", "Duranddupont", "Toto", "22 rue aux accents éàè", "39300", "Laville", "France", "toto@toto.fr", "0145689574", "0658963247", "supertoto", "supertoto"));
// O → l'insertion s'est terminée correctement. 1 → le login existe déjà.

//$client = new Client(null, null, null, null, '251 rue Frédéric', null, null, null, null, null, null, null, null);
//echo $client->getAdresse();

//$dao->ajoutMessage('toto', 'toto', 'k@gj.fr', 'sujet', '01458956', 'bla bla');

//var_dump($dao->getBilletByNumresa('2'));

//$_SESSION['login'] = 'isabella';
//$_SESSION['passwd'] = 'taylor';
//var_dump($dao->clientEstConnecte());

//$_SESSION['login_admin'] = 'admin';
//$_SESSION['passwd'] = '$5$ABCDEFGHIJKLM$ssnQ4OwPltNcbxGU21HYZn8e4WJ7f1p6wzo2Rv0Chk0'; // mot de passe chiffré
//var_dump($dao->adminEstConnecte());

//var_dump($dao->getResasByLogin('isabella'));

//var_dump($dao->getDetailsResaByNumresa('3'));

//var_dump($dao->estMajeur('2003-04-04', '2013-12-31'));
//var_dump($dao->estMajeur('1983-04-04', '2013-12-31'));

//var_dump($dao->payePleinTarif('2013-05-05', '2013-12-25'));
//var_dump($dao->payePleinTarif('2010-12-05', '2013-12-25'));

$tableau_passagers = array(
    $pass1 = new Passager(null, 'M', 'Toto', 'Toto', '2001-04-05'),
    $pass2 = new Passager(null, 'Mme', 'Titi', 'Titi', '1991-04-05')
);
$numreservation = ''; // on le passe par référence
// renvoie 0 si tout se passe bien
var_dump($dao->processusReservation('isabella', $tableau_passagers, 'DF1', $numreservation));
echo $numreservation; // on récupère le numéro de la résa créée
?>
