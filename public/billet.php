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
        <title>DEV-FLY - Billet Electronique</title>
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
                 <?php
            // ici on affichera le bouton de déconnexion
			include('include/back_office_login_form.php');
            ?>
                 </div>
        <div id="developpement">
           
             <div id="billet">  
                <table>
                    <tr>
                        <th>Date&nbsp;&nbsp;&nbsp;</th><th>Horaire</th><th>Ville de départ</th><th>Ville d'arrivée</th>
                    <th>Compagnie</th>
                    </tr>
                    
                </table>
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
