<?php 
if (!isset($_SESSION)) {
    session_start();
}
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
        <title>DEV-FLY - Détails des passagers</title>
    </head>
    <body>
          <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
                <div id="menu">
                     <ul class="nav nav-tabs">
                        <li><a href="vol" data-toggle="tab">Vol</a></li>
                        <li class="active"><a href="passager" data-toggle="tab">Passager</a></li>
                        <li><a href="employe" data-toggle="tab">Employé</a></li>
                        <li><a href="reservation" data-toggle="tab">Réservation</a></li>
                        <li><a href="client" data-toggle="tab">Client</a></li>
                    </ul>
                    </div>
                 <?php
            // ici on affichera le bouton de déconnexion
			include('include/back_office_login_form.php');
            ?>
                 </div>
        <div id="developpement">
		<?php 
			
			// On affiche le message d'erreur le cas échéant :
			if (isset($message) && strlen($message) > 0) : ?>
				<p><?php echo $message ?></p>
                                 
        <?php
				
        // Si il n'y a pas d'erreur, on affiche la liste des passagers concernés par la réservation :
              else : ?>
        
                <div><h3>Passagers sur la réservation <a href="/affichageReservationController/action/<?php echo htmlentities($_GET['numreservation'], ENT_QUOTES, 'UTF-8');?>"><?php echo htmlentities($_GET['numreservation'], ENT_QUOTES, 'UTF-8') ?></a></h3></div><br/>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            éligibles en entités HTML -->
           
                <div id="tablepassagerresa">  
                <table>
                    <tr>
                        <th>N° de passager &nbsp;&nbsp;&nbsp;</th><th>N° de place</th>
                    </tr>
                    <?php foreach ($tab as $value) : ?>
                    <tr>
                                <td><a href="/affichagePassagerController/action/<?php 
                                    echo htmlentities($value['numpassager'], ENT_QUOTES, 'UTF-8');?>"><?php 
                                    echo htmlentities($value['numpassager'], ENT_QUOTES, 'UTF-8') ?></a></td>
                                <td><?php echo htmlentities($value['numplace'], ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            
        <?php endif; ?><br/>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        </div>

        <!-- Ci-dessous le JavaScript pour la navigation en onglets --> 
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.js"></script>
       
            <div id="footer">
                <?php
                include './include/footer.php';
               ?>
           </div> 
        </div>
    </body>
    
</html>
