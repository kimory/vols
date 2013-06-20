<?php
include('../setup.php');

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
        <title>DEV-FLY - Contact</title>
    </head>
    
    <body>
            <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
                <div id="menu">
                     <?php 
				$_SESSION['page_actuelle'] = 'Contact';
				include('include/menu_front_office.php'); 
			?>
                    </div>
		       <?php include('include/back_office_login_form.php'); ?>
                </div>
			
            <div id="developpement">
                <div id="error">
                   <?php if (isset($_SESSION['messages'])) : ?>
                        <ul>
                            <?php foreach ($_SESSION['messages'] as $value) : ?>
                                <li><?php echo $value ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php
                        // On détruit les messages en session une fois
                        // qu'ils ont été affichés
                        unset($_SESSION['messages']);
                    endif;
                    ?>
                </div>
                <div id="contact">
                <form action="/ContactController" method="POST" >
                    <fieldset>
                        <h5>Vos coordonnées</h5> 

                        <label for = "nom">Nom</label>
                           <input type="text" name="nom" id="nom" size="30" >

                        <label for = "prenom">Prénom</label>
                           <input type="text" name="prenom" id="prenom" size="30" ><br>

                        <label for = "mail">Votre e-mail</label> 
                           <input type="text" name="mail" size="30" /><br>
                        
                        <label for = "sujet">Sujet</label>
                        <input type="text" name="sujet" size="30" /><br>
                        <textarea name="message" rows="6" wrap="virtual" cols="30"></textarea><br>
                        
                        <label for= "telephone">Téléphone</label>
                        <input type="text" name="telephone" size="30" /><br>       
                        <div id="submit">
                            
                           <input type="submit" value="valider">          
                           <input type="reset" value="annuler">
                        </div>

                    </fieldset>

                </form>
                    </div>

             </div>
            <div id="footer">
                <?php
                include './include/footer.php';
               ?>
           </div> 
        </div>
    </body>
</html>
