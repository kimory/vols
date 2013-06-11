<?php 
if (!isset($_SESSION)) {
    session_start();
}

include_once("../setup.php");

use entity\Client;
use entity\User;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />     
        <title>DEV-FLY - Espace Client</title>
    </head>
    <body>
        <div id="supercontainer">
            <header>
                <?php include('include/back_office_login_form.php'); ?>
            </header>
            <?php
            $_SESSION['page_actuelle'] = 'Espace Client';
            include('include/menu_front_office.php');
            include('include/user_connection_form.php');
            ?>

            <?php
            // Si l'utilisateur n'est pas connecté
            if (!Client::isClientConnected()) {
                // affichage de la création d'un compte client
                include('include/create_user_form.php');
                // Si le client est connecté, on affiche ses réservations
            } else {
                // affichage de la liste des réservations du client
                ?>
                <a href='/reservationsController' ><button class="btn btn-large btn-primary" type="button">Voir ses réservations</button></a>

                <?php
                // Si la variable ci-dessous existe, alors on demande
                // à afficher les réservations
                if (isset($_SESSION['resultat_liste_reservations'])) {
                    // Le tableau contient des éléments, on l'affiche
                    if (count($_SESSION['resultat_liste_reservations']) > 0) {
                        ?>
                        <table>
                            <tr>
                                <th>Numéro de réservation</th>
                                <th>Date de réservation</th>
                                <th>Lieu de départ</th>
                                <th>Lieu d'arrivée</th>
                                <th>Date de départ</th>
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
                                    <td><?php echo $row['lieuarrivee'] ?></td>
                                    <?php $datedepart = new Datetime($row['datedepart']);?>
                                    <td><?php echo $datedepart->format('d/m/Y H:i');?></td>
                                </tr>
                        <?php endforeach; ?>
                        </table>
                        <?php
                    }
                    // Le tableau ne contient pas d'éléments
                    else {
                        ?>
                        <p>Vous n'avez pas passé de réservation jusqu'à présent.</p>
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

                        <table>
                            <tr>
                                <th>Numéro de réservation</th>
                                <th>Date de réservation</th>
                                <th>Lieu de départ</th>
                                <th>Lieu d'arrivée</th>
                                <th>Date de départ</th>
                                <th>Prix</th>
                                <th>Numéro de place</th>
                                <th>Numéro de passager</th>

                            </tr>
            <?php
            // On affiche toutes les lignes
            foreach ($_SESSION['resultat_infos_reservation'] as $row) :
                ?>
                                <tr>
                                    <td><?php echo $row['numreservation'] ?></td>
                                    <?php $datereservation = new Datetime($row['datereservation']);?>
                                    <td><?php echo $datereservation->format('d/m/Y'); ?></td>
                                    <td><?php echo $row['lieudepart'] ?></td>
                                    <td><?php echo $row['lieuarrivee'] ?></td>
                                    <?php $datedepart = new Datetime($row['datedepart']);?>
                                    <td><?php echo $datedepart->format('d/m/Y H:i');?></td>
                                    <td><?php echo $row['prix'] ?></td>
                                    <td><?php echo $row['numeroplace'] ?></td>
                                    <td><?php echo $row['numeropassager'] ?></td>
                                </tr>
                        <?php endforeach; ?>
                        </table>
                        <?php
                        unset($_SESSION['resultat_infos_reservation']);
                    }
                }
            }
            ?>
            <footer>

            </footer>
        </div>
    </body>

</html>
