<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Affichage des passagers</title>
    </head>
    <body>
        
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php
        // Si il n'y a pas d'erreur, on affiche la liste des passagers concernés par la réservation :
              else : ?>
        
                <div><h3>Passagers sur la réservation <?php echo $_GET['numreservation'];?></h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
            <div>
                <table>
                    <tr>
                        <th>N° de passager</th><th>Place</th>
                    </tr>
                    <?php foreach ($tab as $value) : ?>
                    <tr>
                            <?php foreach ($value as $donnee) : ?>
                                <td><?php echo htmlentities($donnee, ENT_QUOTES, 'UTF-8'); ?></td>
                            <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour</a></div>
        
    </body>
    
</html>
