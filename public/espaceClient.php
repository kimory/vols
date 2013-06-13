<?php 
if (!isset($_SESSION)) {
    session_start();
}

include_once("../setup.php");

use entity\Client;
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
			?>
                     <div id="btvision">
                <a href='/reservationsController' ><button class="btn btn-large btn-primary" type="button">Voir ses réservations</button></a>
                 </div>
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
                ?>
                <?php
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
                                        echo $row['numreservation'] ?>"><?php
                                        echo $row['numreservation'] ?></a>
                                    </td>
                                    
                                    <?php $datereservation = new Datetime($row['datereservation']);?>
                                    <td><?php echo $datereservation->format('d/m/Y'); ?></td>
                                    <td><?php echo $row['lieudepart'] ?></td>
                                    <td><?php echo $row['lieuarrivee'] ?></td><br/>
                                    <?php $datedepart = new Datetime($row['datedepart']);?>
                                    <td><?php echo $datedepart->format('d/m/Y H:i');?></td>
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
                                    <td><?php echo $row['numreservation'] ?> &nbsp;&nbsp;&nbsp;</td>
                                    <?php $datereservation = new Datetime($row['datereservation']);?>
                                    <td><?php echo $datereservation->format('d/m/Y'); ?> &nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['lieudepart'] ?>&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['lieuarrivee'] ?>&nbsp;&nbsp;&nbsp;</td>
                                    <?php $datedepart = new Datetime($row['datedepart']);?>
                                    <td><?php echo $datedepart->format('d/m/Y H:i');?>&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['prix'] ?>&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['numeroplace'] ?>&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $row['numeropassager'] ?>&nbsp;&nbsp;&nbsp;</td>
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
               <p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
           </div> 
        </div>
   
    </body>

</html>
