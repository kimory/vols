<?php 
if (!isset($_SESSION)) {
    session_start();
}

use \DateTime;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="content-language" content="fr">
        <meta name="author" content="GRETA 2013">
        <meta name="description" content="application pour une compagnie aérienne">
        <meta name="robots" content="index, follow, all">    
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
        <title>DEV-FLY - Détails des vols</title>
    </head>
    <body>
            <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
                <div id="menu">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#vol" data-toggle="tab">Vol</a></li>
                        <li><a href="#passager" data-toggle="tab">Passager</a></li>
                        <li><a href="#employe" data-toggle="tab">Employé</a></li>
                        <li><a href="#reservation" data-toggle="tab">Réservation</a></li>
                        <li><a href="#client" data-toggle="tab">Client</a></li>
                    </ul>
                    </div>
		       <?php 
                       // ici on affichera le bouton de déconnexion
                       include('include/back_office_login_form.php'); ?>
            </div>
             <div id="developpement">
		<?php 
			// On affiche le message d'erreur le cas échéant :
			if (isset($message) && strlen($message) > 0) : ?>
				<p><?php echo $message ?></p>
              <?php
        // Si il n'y a pas d'erreur, on affiche la liste des vols sur lesquels l'employé travaille :
			else : ?>
        
                <div><h3>Description des vols de l'employé N° <a href="/affichageEmployeController/action/<?php echo htmlentities($_GET['numemploye'], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($_GET['numemploye'], ENT_QUOTES, 'UTF-8') ?></a></h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            éligibles en entités HTML -->
            <div>
                <table>
                    <tr>
                        <th>Trajet</th><th>N° du vol</th><th>Date de départ</th>
                    </tr>
                    <?php foreach ($tab as $value) : ?>
                    <tr>
                        <td>
                            <?php echo htmlentities($value->getLieuDepart(), ENT_QUOTES, 'UTF-8'); ?> -
                            <?php echo htmlentities($value->getLieuArrivee(), ENT_QUOTES, 'UTF-8'); ?>
                        </td>       
                        <td><a href="/affichageVolController/action/<?php
                            echo htmlentities($value->getNumVol(), ENT_QUOTES, 'UTF-8');?>"><?php 
                            echo htmlentities($value->getNumVol(), ENT_QUOTES, 'UTF-8') ?></a></td>
                        <?php $datedep = new DateTime($value->getDateHeureDepart()); ?>
                        <td><?php echo htmlentities($datedep->format('d/m/Y'), ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
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
