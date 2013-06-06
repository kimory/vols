<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Détails du client</title>
    </head>
    <body>
        <form action="/affichageClientController" method="POST">
            <label for="numclient">Nouveau numéro de client :</label>
            <input type="text" id="numclient" name="numclient"><br>
            <input type="submit" value="OK">
        </form>
        
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php // Si il n'y a pas d'erreur, on affiche les informations sur le client recherché :
              else : ?>
        
                <div><h3>Description du client</h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
            <div>
                <p>N° client : <?php echo htmlentities($client->getId(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Civilité : <?php echo htmlentities($client->getCivilite(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Nom : <?php echo htmlentities($client->getNom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Prénom : <?php echo htmlentities($client->getPrenom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Adresse : <?php echo htmlentities($client->getAdresse(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Code postal : <?php echo htmlentities($client->getCp(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Ville : <?php echo htmlentities($client->getVille(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Pays : <?php echo htmlentities($client->getPays(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>E-mail : <?php echo htmlentities($client->getMail(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Tél fixe : <?php echo htmlentities($client->getTelFixe(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Tél portable : <?php echo htmlentities($client->getTelPortable(), ENT_QUOTES, 'UTF-8') ?></p>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        
    </body>
    
</html>
