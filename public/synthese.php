<?php
use \DateTime;
use entity\Vol;

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
        <!-- règle le problème de compatibilité avec les versions d'IE antérieures à IE9-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />     
        <title>DEV-FLY - Synthèse</title>
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
                    <?php include('include/formulaire_auth_admin.php'); ?>

            </div>
            
            <div id="developpement">
                <div id="connectionuser">
                    <?php
                    include('include/formulaire_connexion_client.php');
                     ?>
                </div>
                
                <div id="errorsynthese">
                    <?php 
                    if (isset($_SESSION['message'])) : ?>
                        <div id="error">
                            <p><?php echo $_SESSION['message']; ?></p>
                        </div>
                        <?php
                        // On détruit le message en session une fois
                        // qu'il a été affiché
                        unset($_SESSION['message']);
                    endif;
                    ?>
                </div>
                
                <div id="synthese">
                    <p>Vous souhaitez réserver <?php echo $_SESSION['nb_passagers']; ?> place(s) pour le 
                            <?php $dateheuredep = new DateTime($_SESSION['vol']->getDateHeureDepart()); ?>
                            <?php echo $dateheuredep->format('d/m/Y à H:i'); ?> pour le vol <?php echo $_SESSION['vol']->getNumvol(); ?>
                            de <?php echo $_SESSION['vol']->getLieuDepart(); ?> à <?php echo $_SESSION['vol']->getLieuArrivee(); ?>.
                    </p>
                    <p>Pour les passagers suivants : </p>
                    <ul>
                        <?php foreach($_SESSION['passagers'] as $passager) : ?>
                            <li>
                                <?php
					$dn_p_dt = new DateTime( $passager->getDateNaissance());

                                        echo $passager->getNom() . " " . 
                                            $passager->getPrenom() . ', né(e) le : ' . 
                                            $dn_p_dt->format('d/m/Y');
                                ?>
                            </li>        
                        <?php endforeach; ?>
                    </ul>

                </div>
                <br>
                <p>Prix total : <?php echo $_SESSION['tarif'];?> €</p>
                <br>
                    
                <div>
                    <p>Les e-cartes bleues et cartes transcash ne sont pas acceptées.</p>
                    <form method="post" action="/SyntheseC" >
                            <label for="numcarte">Numéro de carte</label>
                            <input type="text" name="numcarte" id="numcarte">

                            <div id="date">
                                <label for="moisexpiration">Mois d'expiration : </label>
                                <input type="text" name="moisexpiration" id="moisexpiration">
                                <label for="anneeexpiration">Année d'expiration : </label>
                                <input type="text" name="anneeexpiration" id="anneeexpiration">
                            </div>
                                
                            <label for="nomporteur">Nom du porteur</label>
                            <input type="text" name="nomporteur" id="nomporteur">

                            <label for="codesecurite">Code de sécurité</label>
                            <input type="text" name="codesecurite" id="codesecurite"><br>

                            <input type="submit" value="valider">
                            <input type="reset" value="annuler">
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
