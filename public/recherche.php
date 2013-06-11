<?php session_start(); ?>
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
        <title>DEV-FLY - Recherche</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
                <div id="menu">
                     <?php 
				$_SESSION['page_actuelle'] = 'Rechercher un vol';
				include('include/menu_front_office.php'); 
				include('include/user_connection_form.php');
			?>
                    </div>
		       <?php include('include/back_office_login_form.php'); ?>
            </div>
			
            <div id="developpement">
                   <?php if (isset($_SESSION['messages'])) : ?>
                    <ul>
                        <?php foreach ($_SESSION['messages'] as $value) : ?>
                            <li><?php echo $value ?></li>
                        <?php endforeach; ?>
                   </ul>
                <?php endif; ?>
                <form action="/PropositionsController" method="POST" >
                    <fieldset>
                        <legend>Votre sélection</legend> 

                        <label for ="villedepart">Ville de départ</label>
                           <input type="text" name="villedepart" id="villedepart">

                        <label for ="villearrivee">Ville d'arrivée</label>
                           <input type="text" name="villearrivee" id="villearrivee"><br>

                        <label for ="datedepart">Date de départ</label>                        
                           <input type="text" id="jour" name="jour" size="3" >/
                           <input type="text" id="mois" name="mois" size="3">/
                           <input type="text" id="annee" name="annee" size="3"><br>

                        <label for ="nbreadultes">Nombre d'adultes</label>
                           <input type='number' value="1" min='1' max='30' name="nbreadultes" id="nbreadultes">

                        <label for ="nbreenfants">Nombre d'enfants (moins de 3 ans)</label>
                           <input type='number' value="0" min='0' max='30' name="nbreenfants" id="nbreenfants"><br>

                        <div id="submit">
                           <input type="submit" value="valider">          
                           <input type="reset" value="annuler">
                        </div>



                    </fieldset>

                </form>

             </div>
            <div id="footer">
                <p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
           </div> 
        </div>
    </body>

</html>
