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
        <title>DEV-FLY - Proposition</title>
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
		        include('include/user_connection_form.php');
			?>
                    </div>
		       <?php include('include/back_office_login_form.php'); ?>
            </div>
       
           <div id="developpement">
               
                <div class="h6">                   
                    <h6>Votre sélection</h6>
                        <?php //$datesouhaitee = new DateTime($vols[0]->getDateHeureDepart()); ?>
                        <p>Vous partez de <?php echo $vols[0]->getLieuDepart(); ?> et vous arrivez à <?php echo $vols[0]->getLieuArrivee(); ?> .</p>
                        <p>Date de départ souhaitée :<?php //echo $date_depart_souhaitee->format('d/m/Y'); ?></p>
                        <p>Vous êtes <?php echo $nb_passagers ?> passager(s).</p>
                </div>                    
                </div>
                
<!--                        <legend>Nos propositions</legend> 
                        <h5>Date de départ</h5>
                        Choix 1 "dateheure" "prix": <input type="radio" name="choix" value="1" checked><br>
                        Choix 2 "dateheure" "prix": <input type="radio" name="choix" value="2"><br>
                        Choix 3 "dateheure" "prix": <input type="radio" name="choix" value="3"><br>                       -->

                    
                <input  type="submit" value="valider">
                <input  type="reset" value="annuler">
            
          
            <div id="footer">
               <p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
           </div> 
        </div>
    </body>
</html>
