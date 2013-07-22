<?php
include('../setup.php');

use \DateTime;
use entity\Vol;

if (!isset($_SESSION)) {
    session_start();
}

$vols = $_SESSION['vols'];
$nb_passagers = $_SESSION['nb_passagers'];
$datedepartsouhaitee = $_SESSION['date_depart_souhaitee'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="content-language" content="fr">
        <meta name="author" content="GRETA 2013">
        <meta name="description" content="application pour une compagnie aérienne">
        <meta name="robots" content="index, follow, all">    
        <!-- règle le problème de compatibilité avec les versions d'IE antérieures à IE9-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
                    ?>
                </div>
                
		<?php include('include/back_office_login_form.php'); ?>
            </div>
            
           <div id="developpement">
                <div id="connectionuser">
                     <?php
                        include('include/user_connection_form.php');
			?>
                 </div>
               
                <div id="errorproposition">
                   <?php
                   if (isset($_SESSION['msg_vol_non_choisi']) && strlen($_SESSION['msg_vol_non_choisi']) > 0) : ?>
                       <p><?php echo $_SESSION['msg_vol_non_choisi']; ?></p>
                       <?php
                       // On détruit le message en session une fois
                       // qu'il a été affiché.
                       unset($_SESSION['msg_vol_non_choisi']);
                   endif;
                   ?>
                </div>
               
               
                <div class="h5">                   
                    <h5>Votre sélection</h5>
                        <p>Vous partez de <?php echo $vols[0]->getLieuDepart(); ?> et vous arrivez à <?php echo $vols[0]->getLieuArrivee(); ?>.</p>
                        <p>Date de départ souhaitée : <?php echo $datedepartsouhaitee; ?></p>
                        <p>Vous êtes <?php echo $nb_passagers ?> passager(s).</p>
                </div>
               
                <div>
                    <form action="/EnregistrementPassagersController" method="POST">
                        <fieldset>
                            <h5>Nos propositions</h5>
                            <p class="remarque">Remarque : les prix sont indiqués en fonction des nombres d'adultes
                                et d'enfants renseignés.</p>

                            <?php // On parcourt la liste des vols récupérés pour les proposer au client.
                            foreach($vols as $vol) : ?>
                                <?php // On indique le format dans lequel la date est récupérée.
                                $datedepart = DateTime::createFromFormat('d/m/Y H:i',$vol->getDateHeureDepart());?>
                                <input type="radio" name="volchoisi" value="<?php echo $vol->getNumvol();?>">
                                Vol N°<?php echo $vol->getNumvol();?> : départ le <?php
                                    echo $datedepart->format('d/m/Y à H:i');?>. Prix : <?php
                                    echo $vol->getTarif(); ?> €<br>
                            <?php endforeach; ?><br/>

                            <input  type="submit" value="valider">
                            <input  type="reset" value="annuler">
                        </fieldset>
                    </form>
                </div>
               
            </div>
            
            <div id="footer">
                <?php
                include VIEW . 'include/footer.php';
                ?>
            </div> 
        </div>
    </body>
</html>
