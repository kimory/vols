<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Affichage réservation</title>
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
        
            <h3>Description du passager</h3>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
            <p>N° réservation : <?php echo htmlentities($reservation->getNumReservation(), ENT_QUOTES, 'UTF-8') ?></p>
            <p>N° vol : <?php echo htmlentities($reservation->getVol(), ENT_QUOTES, 'UTF-8') ?></p>
            <?php $dateheuredep = new DateTime($reservation->getDateDuVol())?>
            <p>Date de départ : <?php echo htmlentities($dateheuredep->format('d/m/Y'), ENT_QUOTES, 'UTF-8') ?></p>
            <p>Heure de départ : <?php echo htmlentities($dateheuredep->format('H:i'), ENT_QUOTES, 'UTF-8') ?></p>
            <p>N° client : <?php echo htmlentities($reservation->getClient(), ENT_QUOTES, 'UTF-8') ?></p>
            <p>Nombre de passager(s) : <?php echo htmlentities($reservation->getPassager(), ENT_QUOTES, 'UTF-8') ?></p>
        
        <?php endif; ?>
                
        <p><a href="/choixducritere">retour</a></p>
        
    </body>
    
</html>
