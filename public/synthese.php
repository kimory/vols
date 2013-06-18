<?php
if (!isset($_SESSION)) {
    session_start();
}
use \DateTime;
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
                    <div id="developpement">
			<div id="error">
				<?php if (isset($_SESSION['message'])) : ?>
					<p><?php echo $_SESSION['message']; ?></p>
					<?php
					// On détruit le message en session une fois
					// qu'il a été affiché
					unset($_SESSION['message']);
				endif;
				?>
			</div>
			<p>Vous souhaitez réserver <?php echo $_SESSION['nb_passagers']; ?> place(s) pour le 
				<?php $dateheuredep = new DateTime($_SESSION['vol']->getDateHeureDepart()); ?>
                                <?php echo $dateheuredep->format('d/m/Y à H:i'); ?> pour le vol <?php echo $_SESSION['vol']->getNumvol(); ?>
				de <?php echo $_SESSION['vol']->getLieuDepart(); ?> à <?php echo $_SESSION['vol']->getLieuArrivee(); ?>.
			</p>
			<p>Pour les passagers suivants : </p>
			<?php
			foreach($_SESSION['passagers'] as $passager)
			{
				echo 
				$passager->getNom() . " " . 
				$passager->getPrenom() . ' né(e) le : ' . 
				$passager->getDateNaissance() . PHP_EOL;
			}
			?>
                        <br>
                        <p>Prix total : <?php echo $_SESSION['vol']->getTarif();?></p>
			<div>
			<p>Les e-cartes bleues et cartes transcash ne sont pas acceptées.</p>
			<form action="/syntheseController" >
				<label for="numcarte">Numéro de carte</label>
				<input type="text" name="numcarte" id="numcarte">

				<label for="moisexpiration">Date d'expiration</label>
				<select name='moisexpiration' id='moisexpiration' >
				<option value="1">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="9">09</option>
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
				<input type="text" name="codesecurite" id="codesecurite"><br>
                                <input type="submit" value="valider">
				<input type="reset" value="annuler">
			</form>
			</div>
                        </div>
			<div id="footer">
                        <?php
                        include './include/footer.php';
                       ?>
                    </div> 
		</div>
	</body>
</html>
