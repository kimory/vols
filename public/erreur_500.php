<?php 
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php header("HTTP/1.1 500 INTERNAL SERVER ERROR"); ?>
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
        <title>DEV-FLY - Erreur</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
                </div>
                
                <div id="menu">
                    <?php
                    $_SESSION['page_actuelle'] = 'Qui sommes nous ?';
                    include('include/menu_front_office.php');
                    ?>
                </div>
		<?php include('include/formulaire_auth_admin.php'); ?>
            </div>
            
            <div id="developpement">
                <h1>Erreur</h1>
                <p>La page que vous cherchez n'a pas pu s'afficher correctement !<br>
                Nous vous invitons à réessayer.</p>

                <p>Si l'erreur persiste, merci de contacter l'administrateur du site.</p>
                <p><a href="/">retour à l'accueil</a></p>
            </div>
            
            <div id="footer">
                <?php
                include VIEW . 'include/footer.php';
               ?>
           </div> 
        </div>
    </body>
</html>
