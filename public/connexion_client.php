<?php
use entity\Client;
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
            <title>DEV-FLY - Connexion / Enregistrement</title>
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
					<h2>Se connecter</h2>
					<p class='remarque'>Si vous possédez déjà un compte.</p>
                    <?php
                    include('include/formulaire_connexion_client.php');
                    ?>
                </div>
                <div id="userregistration">
                <?php
                // Si on arrive sur cette page, c'est que le client n'est pas connecté
                if (!Client::isClientConnected()) :
					?>
					<h2>S'enregistrer</h2>
					<p class='remarque'>Si vous n'êtes pas encore inscrit.<br>
                                           Vous serez automatiquement connecté à votre compte client dès l'inscription effectuée !</p>
					<?php
                    include('include/formulaire_creation_client.php');
                endif;
                ?>
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
