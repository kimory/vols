<?php
if (!isset($_SESSION)) {
    session_start();
}; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Qui sommes-nous ?</title>
    </head>
    <body>
        <div id="supercontainer">
            <header>
                <?php include('include/back_office_login_form.php'); ?>
            </header>
			<?php 
				$_SESSION['page_actuelle'] = 'Qui sommes-nous ?';
				include('include/menu_front_office.php'); 
				include('include/user_connection_form.php');
			?>
            <div id="container">
                <h1>Qui sommes-nous ?</h1>
                <p>DEV-FLY est une filiale d'Air France créée en décembre 2012, dont les locaux sont basés à Paris.</p>
                <p>Nos avions Airbus transportent des milliers de passagers chaque jour sur les différents continents.</p>
                <p>Choisir DEV-FLY, c'est profiter de prix très compétitifs pour voyager selon vos envies... À ce jour, notre catalogue couvre plus de 40 destinations : profitez-en !</p>
            </div>
            <footer>

            </footer>
        </div>
    </body>

</html>
