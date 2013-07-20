<?php
include_once("../setup.php");

use entity\Client;

if (!isset($_SESSION)) {
    session_start();
}

// La page sur laquelle on devra aller une fois connecté est la page courante :
$_SESSION['pagesurlaquelleondoitaller'] = $_SERVER['REQUEST_URI'];

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
        <title>DEV-FLY - Espace Client</title>
    </head>
    <body>
         <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
                </div>
                
                <div id="menu">
                    <?php
                    $_SESSION['page_actuelle'] = 'Espace Client';
                    include('include/menu_front_office.php'); 
                    ?>
                </div>
                
		<?php include('include/back_office_login_form.php'); ?>
            </div>

             <div id="developpement">
                 <div id="connectionuser">
                    <?php
                    include('include/user_connection_form.php');
                    if (Client::isClientConnected()) : // on affiche le bouton seulement si le client est connecté
                        ?>
                        <div id="btvision">
                                <a href='/reservationsController'><button class="btn btn-large btn-primary" type="button">Voir ses réservations</button></a>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                 
                <div id="inscription">
                    <?php
                    // Si l'utilisateur n'est pas connecté
                    if (!Client::isClientConnected()) {
                        // affichage de la création d'un compte client
                        include('include/create_user_form.php');
                        // Si le client est connecté, on affiche ses réservations
                    } else {
                        // affichage de la liste des réservations du client

                        // Si la variable ci-dessous existe, alors on demande
                        // à afficher les réservations
                        if (isset($_SESSION['resultat_liste_reservations'])) {
                            // Le tableau contient des éléments, on l'affiche
                            if (count($_SESSION['resultat_liste_reservations']) > 0) {
                                ?>
                                <div class="tablereservation">
                                    <table>
                                        <tr>
                                            <th> Numéro de réservation  </th>
                                            <th> Date de réservation </th>
                                            <th>Lieu de départ&nbsp;&nbsp; </th>
                                            <th>Lieu d'arrivée &nbsp;&nbsp;</th>
                                            <th>Date de départ </th>
                                        </tr>
                                        <?php
                                        // affichage de toutes les lignes
                                        foreach ($_SESSION['resultat_liste_reservations'] as $row) :
                                            ?>                         
                                            <tr>
                                                <td><a href="/reservationDetailsController/action/<?php
                                                    echo htmlentities($row['numreservation'], ENT_QUOTES, 'UTF-8')?>"><?php
                                                    echo htmlentities($row['numreservation'], ENT_QUOTES, 'UTF-8') ?></a>
                                                </td>

                                                <?php $datereservation = new Datetime($row['datereservation']);?>
                                                <td><?php echo htmlentities($datereservation->format('d/m/Y'), ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlentities($row['lieudepart'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlentities($row['lieuarrivee'], ENT_QUOTES, 'UTF-8'); ?></td><br/>
                                                <?php $datedepart = new Datetime($row['datedepart']);?>
                                                <td><?php echo htmlentities($datedepart->format('d/m/Y H:i'), ENT_QUOTES, 'UTF-8');?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                                <?php
                            }
                            // Le tableau ne contient pas d'éléments
                            else {
                                ?>
                                <p>Vous n'avez pas passé de réservation jusqu'à présent.</p>
                                <div id="error">
                                    <?php
                                    }
                                    // Une fois que nous avons affiché ce qu'il y
                                    // avait dans cette variable, on la supprime
                                    unset($_SESSION['resultat_liste_reservations']);
                        }

                                // Sinon si la variable ci-dessous existe, alors
                                // on veut afficher les détails d'une réservation
                                else if (isset($_SESSION['resultat_infos_reservation'])) {
                                    // S'il y a une erreur, on l'affiche puis on la supprime
                                    if (isset($_SESSION['error_message']) &&
                                            strlen($_SESSION['error_message']) > 0) {
                                        echo $_SESSION['error_message'];
                                        // On détruit les variables une fois affichées
                                        unset($_SESSION['error_message']);
                                        unset($_SESSION['resultat_infos_reservation']);
                                    } else {
                                        ?>
                                 </div>
                                <div class="tablereservation">
                                    <table>
                                        <tr>
                                            <th>Numéro de réservation</th>
                                            <th>Date de réservation </th>
                                            <th>Lieu de départ &nbsp;&nbsp;&nbsp;</th>
                                            <th>Lieu d'arrivée &nbsp;&nbsp;&nbsp;</th>
                                            <th>Date de départ &nbsp;&nbsp;&nbsp; </th>
                                            <th>Prix &nbsp;&nbsp;&nbsp;</th>
                                            <th>Numéro de place &nbsp;&nbsp;&nbsp;</th>
                                            <th>Numéro de passager &nbsp;&nbsp;&nbsp;</th>

                                        </tr>
                                        <?php
                                        // On affiche toutes les lignes
                                        foreach ($_SESSION['resultat_infos_reservation'] as $row) :
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($row['numreservation'], ENT_QUOTES, 'UTF-8'); ?> &nbsp;&nbsp;&nbsp;</td>
                                                <?php $datereservation = new Datetime($row['datereservation']);?>
                                                <td><?php echo htmlentities($datereservation->format('d/m/Y'), ENT_QUOTES, 'UTF-8'); ?> &nbsp;&nbsp;&nbsp;</td>
                                                <td><?php echo htmlentities($row['lieudepart'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;&nbsp;&nbsp;</td>
                                                <td><?php echo htmlentities($row['lieuarrivee'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;&nbsp;&nbsp;</td>
                                                <?php $datedepart = new Datetime($row['datedepart']);?>
                                                <td><?php echo $datedepart->format('d/m/Y H:i');?>&nbsp;&nbsp;&nbsp;</td>
                                                <td><?php echo htmlentities($row['prix'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;&nbsp;&nbsp;</td>
                                                <td><?php echo htmlentities($row['numeroplace'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;&nbsp;&nbsp;</td>
                                                <td><?php echo htmlentities($row['numeropassager'], ENT_QUOTES, 'UTF-8'); ?>&nbsp;&nbsp;&nbsp;</td>
                                            </tr>
                                    <?php endforeach; ?>
                                    </table>
                                </div>
                                <?php
                                unset($_SESSION['resultat_infos_reservation']);
                            }
                        }
                    }
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
