<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Détails de la réservation</title>
    </head>
    <body>
        <form action="/affichageReservationController" method="POST">
            <label for="numreservation">Nouveau numéro de réservation :</label>
            <input type="text" id="numreservation" name="numreservation"><br>
            <input type="submit" value="OK">
        </form>
        
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php // Si il n'y a pas d'erreur, on affiche les informations sur le passager recherché :
              else : ?>
        
                <div><h3>Description de la réservation</h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
            <div>
                <p>N° réservation : <?php echo htmlentities($reservation->getNumReservation(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>N° vol : <a href="/affichageVolController/action/<?php
                    echo htmlentities($reservation->getVol()->getNumvol(), ENT_QUOTES, 'UTF-8')?>"><?php
                    echo htmlentities($reservation->getVol()->getNumvol(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <?php $dateheuredep = new DateTime($reservation->getDateDuVol())?>
                <p>Date de départ : <?php 
                    echo htmlentities($dateheuredep->format('d/m/Y'), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Heure de départ : <?php 
                    echo htmlentities($dateheuredep->format('H:i'), ENT_QUOTES, 'UTF-8') ?></p>
                <!-- On veut récupérer le numéro du client pour l'utiliser dans la méthode action
                du controller affichageClientController : -->
                <p>N° client : <a href="/affichageClientController/action/<?php
                    echo htmlentities($reservation->getClient()->getId(), ENT_QUOTES, 'UTF-8')?>"><?php 
                    echo htmlentities($reservation->getClient()->getId(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <p>Nombre de passager(s) : <a href="/affichageDesPassagersController/action/<?php 
                    echo htmlentities($reservation->getNumReservation(), ENT_QUOTES, 'UTF-8')?>"><?php 
                    echo htmlentities($reservation->getNbpassagers(), ENT_QUOTES, 'UTF-8') ?></a></p>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        
    </body>
    
</html>
