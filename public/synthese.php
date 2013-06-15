<?php
use entity\Client;
use entity\Passager;

if (!isset($_SESSION)) {
	session_start();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="content-language" content="fr">
		<meta name="author" content="GRETA 2013">
		<meta name="description" content="application pour une compagnie aérienne">
		<meta name="robots" content="index, follow, all">    
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />     
		<title>DEV-FLY - Synthèse</title>
	</head>
	<body>
            <div id="container">
                <div id="header">
                    <div id="logo">
                        <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
                    </div>
                    <div id="menu">
                        <?php
                        $_SESSION['page_actuelle'] = 'Rechercher un vol';
                        include('include/menu_front_office.php');
                        ?>
                    </div>
                    <?php include('include/back_office_login_form.php'); ?>

                </div>

                <div>
                    <p>Vous souhaitez réserver <?php echo $_SESSION['nb_passagers']; ?> place(s) pour le 
                        <?php echo $vol->getDateHeureDepart(); // TODO ?> pour le vol <?php echo $vol->getNumvol(); // TODO ?>
                        de <?php echo $vol->getLieuDepart(); // TODO  ?> à <?php echo $vol->getLieuArrivee(); // TODO  ?>.
                    </p>
                    <p>Pour les passagers suivants : </p>
                    <?php
                    $i = 0;
                    while ($i < $_SESSION['nb_passagers']) {
                        echo
                        $_SESSION['passagers'][$i]->getNom() . " " .
                        $_SESSION['passagers'][$i]->getPrenom() . ' né(e) le : ' .
                        $_SESSION['passagers'][$i]->getDateNaissance() . PHPEOL;
                        $i++;
                    }
                    ?>
                </div>
                <div>
                    <p>Les e-cartes bleues et cartes transcash ne sont pas acceptées.</p>
                    <form action="/syntheseController" >
                        <label for="numcarte">Numéro de carte</label>
                        <input type="text" name="numcarte" id="numcarte">

                            <label for="moisexpiration">Date d'expiration</label>
                            <select name='moisexpiration' id='moisexpiration' >
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <select name='anneeexpiration' id='anneeexpiration' >
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                            </select>
                            <label for="nomporteur">Nom du porteur</label>
                            <input type="text" name="nomporteur" id="nomporteur">

                                <label for="codesecurite">Code de sécurité</label>
                                <input type="text" name="codesecurite" id="codesecurite">
                                    <input type="reset" value="annuler">
                                        <input type="submit" value="Valider">
                                            </form>
                                            </div>
                                            <div id="footer">
                                                <p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
                                            </div>
                                            </div>
	</body>
</html>
