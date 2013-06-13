<?php 
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="content-language" content="fr">
        <meta name="author" content="GRETA 2013">
        <meta name="description" content="application pour une compagnie aérienne">
        <meta name="robots" content="index, follow, all">    
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
        <title>DEV-FLY - Détails de l'employé</title>
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
		       <?php 
                       // ici on affichera le bouton de déconnexion
                       include('include/back_office_login_form.php'); ?>
            </div>
             <div id="developpement">
		
        <form action="/affichageEmployeController" method="POST">
            <label for="numemploye">Nouveau numéro d'employé :</label>
            <input type="text" id="numemploye" name="numemploye"><br>
            <input type="submit" value="OK">
        </form>
        
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php // Si il n'y a pas d'erreur, on affiche les informations sur l'employé recherché :
              else : ?>
        
                <div><h3>Description de l'employé</h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            éligibles en entités HTML -->
            <div>
                <p>N° employé : <?php 
                    echo htmlentities($employe->getId(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Civilité : <?php 
                    echo htmlentities($employe->getCivilite(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Nom : <?php 
                    echo htmlentities($employe->getNom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Prénom : <?php 
                    echo htmlentities($employe->getPrenom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Fonction : <?php 
                    echo htmlentities($employe->getFonction(), ENT_QUOTES, 'UTF-8') ?></p>
                <p><a href="/affichageDesVolsController/action/<?php 
                    echo htmlentities($employe->getId(), ENT_QUOTES, 'UTF-8')?>">Voir les vols attribués à cet employé</a></p>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
             </div>
        <div id="footer">
                <p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
           </div> 
        </div>
    </body>
    
</html>
