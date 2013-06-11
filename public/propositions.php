<?php
include('../setup.php');
if (!isset($_SESSION)) {
    session_start();
}

use \DateTime;

$vols = $_SESSION['vols'];
$nb_passagers = $_SESSION['nb_passagers'];
$date_depart_souhaitee = $_SESSION['date_depart_souhaitee'];


?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>DEV-FLY - Proposition</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
		<header>
		<?php 
			// ici on affichera le bouton de déconnexion
			include('include/back_office_login_form.php');
		?>
		</header>
		<?php
            $_SESSION['page_actuelle'] = 'Rechercher un vol';
            include('include/menu_front_office.php');
            include('include/user_connection_form.php');
            ?>
        <div id="supercontainer">
            <header>

            </header>
            <div id="container">
               
                <div class="h6">                   
                    <h6>Votre sélection</h6>
                        <?php //$datesouhaitee = new DateTime($vols[0]->getDateHeureDepart()); ?>
                        <p>Vous partez de <?php echo $vols[0]->getLieuDepart(); ?> et vous arrivez à <?php echo $vols[0]->getLieuArrivee(); ?> .</p>
                        <p>Date de départ souhaitée :<?php //echo $date_depart_souhaitee->format('d/m/Y'); ?></p>
                        <p>Vous êtes <?php echo $nb_passagers ?> passager(s).</p>
                </div>                    
                </div>
                
                        <legend>Nos propositions</legend> 
                        <h5>Date de départ</h5>
                        Choix 1 "dateheure" "prix": <input type="radio" name="choix" value="1" checked><br>
                        Choix 2 "dateheure" "prix": <input type="radio" name="choix" value="2"><br>
                        Choix 3 "dateheure" "prix": <input type="radio" name="choix" value="3"><br>                       

                    
                <input  type="submit" value="valider">
                <input  type="reset" value="annuler">
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>
