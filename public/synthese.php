<?php
if (!isset($_SESSION)) {
	session_start();
}
use entity\Client;
use entity\Passager;
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
		<title>DEV-FLY - Espace Client - Synthèse</title>
	</head>
	<body>
		<div class="container">
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
		</div>

		<div class="container">
		<p>Vous souhaitez réserver <?php echo $_SESSION['nb_passagers']; ?> place(s) pour le 
			<?php echo $_SESSION['HEUREDEDEPART']; // TODO ?> pour le vol <?php echo $_SESSION['IDVOL']; // TODO ?>
			de <?php echo $_SESSION['VILLE1']; // TODO ?> à <?php echo $_SESSION['VILLE2']; // TODO ?>.
		</p>
		<p>Pour les passagers suivants : </p>
<?php
		$i = 0;
		while($i < $_SESSION['nb_passagers'])
		{
			echo 
				$_SESSION['passagers'][$i]->getNom() . " " . 
				$_SESSION['passagers'][$i]->getPrenom() . ' né(e) le : ' . 
				$_SESSION['passagers'][$i]->getDateNaissance() . PHPEOL;
		}
?>
		</div>
		<div class="container">
			<div id="footer">
				<p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
			</div> 
		</div>
	</body>
</html>
