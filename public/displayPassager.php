<?php 
if (!isset($_SESSION)) {
    session_start();
}

use \DateTime;

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
        <title>DEV-FLY - Détails du passager</title>
    </head>
    <body>
         <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
                <div id="menu">
                     
                     <ul class="nav nav-tabs">
                         <li><a href="#vol" data-toggle="tab">Vol</a></li>
                        <li class="active"><a href="#passager" data-toggle="tab">Passager</a></li>
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
              <section class="tab-pane active" id="vol">
                
               </section>
                <section class="tab-pane active" id="passager">
                
               </section>
                <section class="tab-pane active" id="client">
                
               </section>
                <section class="tab-pane active" id="employe">
                
               </section>
                <section class="tab-pane active" id="reservation">
                
               </section>
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
            éligibles en entités HTML -->
            <div>
                <p>N° passager : <?php 
                    echo htmlentities($passager->getNumPassager(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Civilité : <?php 
                    echo htmlentities($passager->getCivilite(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Nom : <?php 
                    echo htmlentities($passager->getNom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Prénom : <?php 
                    echo htmlentities($passager->getPrenom(), ENT_QUOTES, 'UTF-8') ?></p>
                <?php $datenaissance = new DateTime($passager->getDateNaissance()); ?>
                <p>Date de naissance : <?php 
                    echo htmlentities($datenaissance->format('d/m/Y'), ENT_QUOTES, 'UTF-8') ?></p>
                <!-- On veut récupérer le numéro de réservation pour l'utiliser dans la méthode action
                du controller affichageReservationController : -->
                <p>N° de réservation : <a href="/affichageReservationController/action/<?php 
                    echo htmlentities($passager->getReservation(), ENT_QUOTES, 'UTF-8')?>"><?php 
                    echo htmlentities($passager->getReservation(), ENT_QUOTES, 'UTF-8') ?></a></p>
                <!-- On veut récupérer le numéro du client pour l'utiliser dans la méthode action
                du controller affichageClientController : -->
                <p>N° de client : <a href="/affichageClientController/action/<?php 
                    echo htmlentities($passager->getClient(), ENT_QUOTES, 'UTF-8')?>"><?php 
                    echo htmlentities($passager->getClient(), ENT_QUOTES, 'UTF-8') ?></a></p>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        </div>
            <div id="footer">
                <?php
                include './include/footer.php';
               ?>
           </div>  
        </div>
    </body>
    
</html>
