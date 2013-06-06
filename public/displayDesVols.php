<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Détails des passagers</title>
    </head>
    <body>
        
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php
        // Si il n'y a pas d'erreur, on affiche la liste des vols sur lesquels l'employé travaille :
              else : ?>
        
                <div><h3>Description des vols de l'employé N°<a href="/affichageEmployeController/action/<?php echo htmlentities($_GET['numemploye'], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($_GET['numemploye'], ENT_QUOTES, 'UTF-8') ?></a></h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
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
                        <td><a href="/affichageVolController/action/<?php echo htmlentities($value->getNumVol(), ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($value->getNumVol(), ENT_QUOTES, 'UTF-8') ?></a></td>
                        <?php $datedep = new DateTime($value->getDateHeureDepart()); ?>
                        <td><?php echo htmlentities($datedep->format('d/m/Y'), ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        
    </body>
    
</html>
