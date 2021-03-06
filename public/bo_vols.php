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
        <title>DEV-FLY - Détails des vols</title>
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
                include('include/menu_bo.php');
                // ici on affichera le bouton de déconnexion
                include('include/formulaire_auth_admin.php');
                ?>
            </div>
            
            <div id="developpement">
                <?php
                // On affiche le message d'erreur le cas échéant :
                if (isset($message) && strlen($message) > 0) :
                    ?>
                    <p><?php echo $message ?></p>
                    <?php
                // Si il n'y a pas d'erreur, on affiche la liste des vols sur lesquels l'employé travaille :
                else :
                    ?>

                    <div><h3>Description des vols de l'employé N° <a href="/employe/<?php echo htmlentities($_GET['numemploye'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($_GET['numemploye'], ENT_QUOTES, 'UTF-8') ?></a></h3></div>

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
                                    <td><a href="/vol/<?php echo htmlentities($value->getNumVol(), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($value->getNumVol(), ENT_QUOTES, 'UTF-8') ?></a></td>
                                    <?php $datedep = new DateTime($value->getDateHeureDepart()); ?>
                                    <td><?php echo htmlentities($datedep->format('d/m/Y'), ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
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
