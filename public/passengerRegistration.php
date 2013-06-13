<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("../setup.php");

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
        <title>DEV-FLY - Espace Client - Enregistrement des passagers</title>
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
            <div id="error">
            <?php
            if (isset($_SESSION['message_erreur'])) {
                ?>
                <p><?php echo $_SESSION['message_erreur']; ?></p>
                <?php
            }
            ?>
                </div>
            <form action="/passengerRegistrationController" method="POST" >
                <fieldset>
                    <legend>Formulaire d'inscription</legend> 

                    <?php
                    $i = $_SESSION['nb_passagers'];
                    while ($i > 0) {
                    // On permet au client d'enregistrer un nombre de passagers
                    // qui correspond au nombre qu'il a indiqué
                        ?>
                        <fieldset>
                            <!-- On récupérera les valeurs sous forme de tableaux -->
                            <legend>Enregistrement du passager n°<?php echo $i; ?></legend>
                            <select name='civilite[]' id='civilite<?php echo $i; ?>' >
                                <option value="m">Monsieur</option>
                                <option value="mme">Madame</option>
                            </select>

                            <label for="nom<?php echo $i; ?>">Nom</label>
                            <input type="text" name="nom[]" id="nom<?php echo $i; ?>">
                            <label for="prenom<?php echo $i; ?>">Prénom</label>
                            <input type="text" name="prenom[]" id="prenom<?php echo $i; ?>">
                                
                            <label for="date_de_naissance<?php echo $i; ?>">Date de naissance</label>
                            <input type="text" name="date_de_naissance[]" id="date_de_naissance<?php echo $i; ?>" placeholder="jj/mm/aaaa">

                        </fieldset>
                            
<?php
    // On diminue $i de 1 (la boucle se terminera une fois le nombre de passagers indiqués atteint)
                        $i--;
                    }
?>
                </fieldset>
                <input type="reset" value="annuler">          
                <input type="submit" value="valider">          
            </form>
           </div>
            <div id="footer">
               <p> &nbsp;&nbsp; &copy; Tous droits réservés &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- DEV-FLY 2013 --</p>
           </div> 
        </div>

</html>
