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
        <!-- régle le probléme de compatibilité des autres versions de IE et les met par défaut en IE9-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" /> 
        <title>DEV-FLY - Qui sommes-nous ?</title>
    </head>
    <body>
       <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
		
                </div>
                <div id="menu">
                <?php
                        $_SESSION['page_actuelle'] = 'Qui sommes nous';
            		include('include/menu_front_office.php'); 
		        
	         ?>
                 </div>
		       <?php include('include/back_office_login_form.php'); ?>
            </div>
             <div id="developpement">
				<div id="connectionuser">
					<?php
					include('include/user_connection_form.php');
					 ?>
				</div>
                <h1>Qui sommes-nous ?</h1>
                <p>DEV-FLY est une filiale d'Air France créée en décembre 2012, dont les locaux sont basés à Paris.<br/>
                Nos avions Airbus transportent des milliers de passagers chaque jour sur les différents continents.<br/>
                Choisir DEV-FLY, c'est profiter de prix très compétitifs pour voyager selon vos envies... À ce jour, notre catalogue couvre plus de 40 destinations : profitez-en !</p>
           </div>
            <div id="footer">
                <?php
                include './include/footer.php';
               ?>
           </div> 
        </div>
    </body>

</html>
