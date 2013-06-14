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
        <title>DEV-FLY - Détails de la réservation</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
                <div id="menu">
                     <?php 
				$_SESSION['page_actuelle'] = 'Contact';
				include('include/menu_front_office.php'); 
			?>
                    </div>
		       <?php include('include/back_office_login_form.php'); ?>
                </div>
			
            <div id="developpement">
		
        <form action="/affichageReservationController" method="POST">
            <label for="numreservation">Nouveau numéro de réservation :</label>
            <input type="text" id="numreservation" name="numreservation"><br>
            <input type="submit" value="OK">
        </form>
        
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php // Si il n'y a pas d'erreur, on affiche les informations sur le passager recherché :
				
              else : ?>
        
                <div><h3>Description de la réservation</h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            éligibles en entités HTML -->
            <div>
                <p>N° réservation : <?php echo htmlentities($reservation->getNumReservation(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>N° vol : <a href="/affichageVolController/action/<?php
                    echo htmlentities($reservation->getVol()->getNumvol(), ENT_QUOTES, 'UTF-8')?>"><?php
                    echo htmlentities($reservation->getVol()->getNumvol(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <?php $dateheuredep = new DateTime($reservation->getDateDuVol())?>
                <p>Date de départ : <?php 
                    echo htmlentities($dateheuredep->format('d/m/Y'), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Heure de départ : <?php 
                    echo htmlentities($dateheuredep->format('H:i'), ENT_QUOTES, 'UTF-8') ?></p>
                <!-- On veut récupérer le numéro du client pour l'utiliser dans la méthode action
                du controller affichageClientController : -->
                <p>N° client : <a href="/affichageClientController/action/<?php
                    echo htmlentities($reservation->getClient()->getId(), ENT_QUOTES, 'UTF-8')?>"><?php 
                    echo htmlentities($reservation->getClient()->getId(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <p>Nombre de passager(s) : <a href="/affichageDesPassagersController/action/<?php 
                    echo htmlentities($reservation->getNumReservation(), ENT_QUOTES, 'UTF-8')?>"><?php 
                    echo htmlentities($reservation->getNbpassagers(), ENT_QUOTES, 'UTF-8') ?></a></p>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        </div>
            <div id="footer">
                <p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
           </div> 
        </div>
    </body>
    
</html>
