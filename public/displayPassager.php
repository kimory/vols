<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Détails du passager</title>
    </head>
    <body>
        <form action="/affichagePassagerController" method="POST">
            <label for="numpassager">Nouveau numéro de passager :</label>
            <input type="text" id="numpassager" name="numpassager"><br>
            <input type="submit" value="OK">
        </form>
        
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php // Si il n'y a pas d'erreur, on affiche les informations sur le passager recherché :
              else : ?>
        
                <div><h3>Description du passager</h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
            <div>
                <p>N° passager : <?php echo htmlentities($passager->getNumPassager(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Civilité : <?php echo htmlentities($passager->getCivilite(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Nom : <?php echo htmlentities($passager->getNom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Prénom : <?php echo htmlentities($passager->getPrenom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Date de naissance : <?php echo htmlentities($passager->getDateNaissance(), ENT_QUOTES, 'UTF-8') ?></p>
                <!-- On veut récupérer le numéro de réservation pour l'utiliser dans la méthode action
                du controller affichageReservationController : -->
                <p>N° de réservation : <a href="/affichageReservationController/action/<?php echo htmlentities($passager->getReservation(), ENT_QUOTES, 'UTF-8')?>"><?php echo htmlentities($passager->getReservation(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <!-- On veut récupérer le numéro du client pour l'utiliser dans la méthode action
                du controller affichageClientController : -->
                <p>N° de client : <a href="/affichageClientController/action/<?php echo htmlentities($passager->getClient(), ENT_QUOTES, 'UTF-8')?>"><?php echo htmlentities($passager->getClient(), ENT_QUOTES, 'UTF-8') ?></a></p>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        
    </body>
    
</html>
