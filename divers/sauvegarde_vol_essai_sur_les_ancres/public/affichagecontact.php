<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="content-language" content="fr">
        <meta name="author" content="GRETA 2013">
        <meta name="description" content="application pour une compagnie aérienne">
        <meta name="robots" content="index, follow, all">    
        <!-- règle le problème de compatibilité avec les versions d'IE antérieures à IE9-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
         <div><h3>Confirmation d'envoi</h3></div>
         <!-- Note : s'il s'agissait d'une appli réelle, on ferait ici un envoi de mails
         vers la(es) boîte(s) mail des personnes concernées dans la compagnie -->

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            éligibles en entités HTML -->
            <div>
               <p> Nous avons bien pris en compte votre demande. </p><br>
               <p> Merci de votre confiance et à bientôt !</p>
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
