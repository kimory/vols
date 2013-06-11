<?php 
if (!isset($_SESSION)) {
    session_start();
}

include_once("../setup.php");

use entity\Client;
use entity\User;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />     
        <title>DEV-FLY - Espace Client - enregistrement des passagers</title>
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

			<form action="/TODO" method="POST" >
				<fieldset>
				<legend>Formulaire d'inscription</legend> 


<?php
			$i = $_SESSION['nb_passagers'];
			while($i > 0)
			{
?>
				<fieldset>
				<legend>Enregistrement du passager n°<?php echo $i; ?></legend>
				<select name='civilite<?php echo $i; ?>' id='civilite' >
					<option value="m">Monsieur</option>
					<option value="mme">Madame</option>
				</select>

				<label for="date_de_naissance<?php echo $i; ?>">Date de naissance</label>
				<input type="text" name="date_de_naissance<?php echo $i; ?>" id="date_de_naissance<?php echo $i; ?>">

				<label for="nom<?php echo $i; ?>">Nom</label>
				<input type="text" name="nom<?php echo $i; ?>" id="nom<?php echo $i; ?>">
				<label for="prenom<?php echo $i; ?>">Prénom</label>
				<input type="text" name="prenom<?php echo $i; ?>" id="prenom<?php echo $i; ?>">

				</fieldset>
<?php
				$i--;
			}
?>
				</fieldset>
				<input type="reset" value="annuler">          
				<input type="submit" value="valider">          
			</form>
            <footer>

            </footer>
        </div>
    </body>

</html>
