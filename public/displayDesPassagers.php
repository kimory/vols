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
        
                <div><h3>Passagers sur la réservation <a href="/affichageReservationController/action/<?php echo htmlentities($_GET['numreservation'], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($_GET['numreservation'], ENT_QUOTES, 'UTF-8') ?></a></h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
            <div>
                <table>
                    <tr>
                        <th>N° de passager</th><th>Place</th>
                    </tr>
                    <?php foreach ($tab as $value) : ?>
                    <tr>
                                <td><a href="/affichagePassagerController/action/<?php echo htmlentities($value['numpassager'], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($value['numpassager'], ENT_QUOTES, 'UTF-8') ?></a></td>
                                <td><?php echo htmlentities($value['numplace'], ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        
    </body>
    
</html>
