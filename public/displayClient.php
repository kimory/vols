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
        <title>DEV-FLY - Détails du client</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
                <div id="menu">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#vol" data-toggle="tab">Vol</a></li>
                        <li><a href="#passager" data-toggle="tab">Passager</a></li>
                        <li><a href="#employe" data-toggle="tab">Employé</a></li>
                        <li><a href="#reservation" data-toggle="tab">Réservation</a></li>
                        <li><a href="#client" data-toggle="tab">Client</a></li>
                    </ul>
                    </div>
            </div>
		<?php 
			// ici on affichera le bouton de déconnexion
			include('include/back_office_login_form.php');
		?>
         <div id="developpement">

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
        
                <div id="titre"><h3>Description du client</h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
            <div id="client">
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
                
        <div id="retour"><a href="/choixducritere">retour au choix du critère</a></div>
          </div>

     
        
            <div id="footer">
                <p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
           </div> 
        </div>
        
    </body>
    
</html>
