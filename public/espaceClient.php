<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <title>DEV-FLY - Espace Client</title>
    </head>
    <body>
        <div id="supercontainer">
            <header>
				<?php include('include/back_office_login_form.php'); ?>
            </header>
			<?php 
				$_SESSION['page_actuelle'] = 'Espace Client';
				include('include/menu_front_office.php');
				include('include/user_connection_form.php');
			?>

			<?php
				// Si l'utilisateur n'est pas connecté
				if( ! isClientConnected()) {
					// affichage de la création d'un compte client
					include('include/create_user_form.php');
					// Si le client est connecté, on affiche ses réservations
				} else {
					// affichage de la liste des réservations du client
					// TODO
				}
			?>
            <footer>

            </footer>
        </div>
    </body>

</html>
