<?php
use \DateTime;

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
        <!-- règle le probléme de compatibilité avec les versions d'IE antérieures à IE9-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
        <title>DEV-FLY - Détails du vol</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
		       <?php
				// on inclut le menu du backoffice
				$_SESSION['page_actuelle'] = 'Vol';
				include('include/back_office_menu.php');
                       // ici on affichera le bouton de déconnexion
                       include('include/back_office_login_form.php'); ?>
                </div>
			
            <div id="developpement">
                <div id="display">
        <form action="/affichageVolController" method="POST">
            <label for="numvol">Nouveau numéro de vol :</label>
            <input type="text" id="numvol" name="numvol"><br>
            <input type="submit" value="OK">
        </form>
        </div>
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php // Si il n'y a pas d'erreur, on affiche les informations sur le vol recherché :
				
              else : ?>
        
                <div><h3>Description du vol</h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            éligibles en entités HTML -->
            <div>
                <p>N° vol : <?php echo htmlentities($vol->getNumvol(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Lieu de départ : <?php echo htmlentities($vol->getLieuDepart(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Lieu d'arrivée : <?php echo htmlentities($vol->getLieuArrivee(), ENT_QUOTES, 'UTF-8') ?></p>
                
                <?php $dateheuredep = new DateTime($vol->getDateHeureDepart())?>
                <p>Date et heure de départ : <?php echo htmlentities($dateheuredep->format('d/m/Y à H:i'), ENT_QUOTES, 'UTF-8') ?></p>
                <?php $dateheurearrivee = new DateTime($vol->getDateHeureArrivee())?>
                <p>Date et heure d'arrivée : <?php echo htmlentities($dateheurearrivee->format('d/m/Y à H:i'), ENT_QUOTES, 'UTF-8') ?></p>
                <p>N° pilote : <a href="/affichageEmployeController/action/<?php
                    echo htmlentities($vol->getPilote(), ENT_QUOTES, 'UTF-8')?>"><?php
                    echo htmlentities($vol->getPilote(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <p>N° copilote : <a href="/affichageEmployeController/action/<?php
                    echo htmlentities($vol->getCopilote(), ENT_QUOTES, 'UTF-8')?>"><?php
                    echo htmlentities($vol->getCopilote(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <p>N° hôtesse / steward 1 : <a href="/affichageEmployeController/action/<?php
                    echo htmlentities($vol->getHotesse_steward1(), ENT_QUOTES, 'UTF-8')?>"><?php 
                    echo htmlentities($vol->getHotesse_steward1(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <p>N° hôtesse / steward 2 : <a href="/affichageEmployeController/action/<?php 
                    echo htmlentities($vol->getHotesse_steward2(), ENT_QUOTES, 'UTF-8')?>"><?php 
                    echo htmlentities($vol->getHotesse_steward2(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <p>N° hôtesse / steward 3 : <a href="/affichageEmployeController/action/<?php 
                    echo htmlentities($vol->getHotesse_steward3(), ENT_QUOTES, 'UTF-8')?>"><?php
                    echo htmlentities($vol->getHotesse_steward3(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <p>Nombre de places restantes sur ce vol : <?php
                    echo htmlentities($vol->getNb_places_restantes(), ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
         </div>
            <div id="footer">
                <?php
                include './include/footer.php';
               ?>
           </div>  
        </div>
    </body>
    
</html>
