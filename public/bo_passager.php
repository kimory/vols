<?php
use \DateTime;

if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
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
        <title>DEV-FLY - Détails du passager</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                    <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
                </div>
                <?php
                // on inclut le menu du backoffice
                $_SESSION['page_actuelle'] = 'Passager';
                include('include/back_office_menu.php');
                // ici on affichera le bouton de déconnexion
                include('include/back_office_login_form.php');
                ?>
            </div>
            
            <div id="developpement">

                <form action="/AffichagePassagerController" method="POST">
                    <label for="numpassager">Nouveau numéro de passager :</label>
                    <input type="text" id="numpassager" name="numpassager"><br>
                    <input type="submit" value="OK">
                </form>

                <?php // On affiche le message d'erreur le cas échéant :
                if (isset($message) && strlen($message) > 0) :
                    ?>
                    <p><?php echo $message ?></p>

                    <?php // Si il n'y a pas d'erreur, on affiche les informations sur le passager recherché :

                else :
                    ?>

                    <div><h3>Description du passager</h3></div>

                    <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
                    éligibles en entités HTML -->
                    <div>
                        <p>N° passager : <?php echo htmlentities($passager->getNumPassager(), ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Civilité : <?php echo htmlentities($passager->getCivilite(), ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Nom : <?php echo htmlentities($passager->getNom(), ENT_QUOTES, 'UTF-8') ?></p>
                        <p>Prénom : <?php echo htmlentities($passager->getPrenom(), ENT_QUOTES, 'UTF-8') ?></p>
                            <?php $datenaissance = new DateTime($passager->getDateNaissance()); ?>
                        <p>Date de naissance : <?php echo htmlentities($datenaissance->format('d/m/Y'), ENT_QUOTES, 'UTF-8') ?></p>
                        <!-- On veut récupérer le numéro de réservation pour l'utiliser dans la méthode action
                        du controller AffichageReservationController : -->
                        <p>N° de réservation : <a href="/reservation/<?php echo htmlentities($passager->getReservation(), ENT_QUOTES, 'UTF-8') ?>"><?php echo htmlentities($passager->getReservation(), ENT_QUOTES, 'UTF-8') ?></a></p>
                        <!-- On veut récupérer le numéro du client pour l'utiliser dans la méthode action
                        du controller AffichageClientController : -->
                        <p>N° de client : <a href="/client/<?php echo htmlentities($passager->getClient(), ENT_QUOTES, 'UTF-8') ?>"><?php echo htmlentities($passager->getClient(), ENT_QUOTES, 'UTF-8') ?></a></p>
                    </div>

                <?php endif; ?>

                <div><a href="/bo_choix_critere">retour au choix du critère</a></div>
            </div>
            
            <div id="footer">
                <?php
                include VIEW . 'include/footer.php';
                ?>
            </div>
            
        </div>
    </body>
    
</html>
