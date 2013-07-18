<?php
use entity\User;

if (!isset($_SESSION)) {
    session_start();
}
include_once("../setup.php");

if(!User::isAdminConnected()){
    // Si un utilisateur non connecté en tant qu'admin tente d'accéder à cette page directement
    // on l'en empêche, en l'envoyant vers une page d'erreur :
    header("Location:/error2");
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
        <!-- règle le problème de compatibilité avec les versions d'IE antérieures à IE9-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
        <title>DEV-FLY - Choix du critère</title>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="logo">
                  <img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
                </div>
                <?php
                // on inclut le menu du backoffice
                $_SESSION['page_actuelle'] = 'Vol';
                include('include/back_office_menu.php');
                 include('include/back_office_login_form.php');
                ?>     
            </div>
            
            <div id="developpement">
                <div class="tab-content">
                    <div class="tab-pane active" id="vol">
                        <h3>Vol</h3>
                        <form action="/affichageVolController" method="POST">
                            <label for="numvol">N° de vol :</label>
                            <input type="text" id="numvol" name="numvol"><br>
                            <input type="submit" value="Valider">
                        </form>
                    </div>

                    <div class="tab-pane" id="passager">
                        <h3>Passager</h3>
                        <form action="/affichagePassagerController" method="POST">
                            <label for="numpassager">N° de passager :</label>
                            <input type="text" id="numpassager" name="numpassager"><br>
                            <input type="submit" value="Valider">
                        </form>
                    </div>

                    <div class="tab-pane" id="employe">
                        <h3>Employé</h3>
                        <form action="/affichageEmployeController" method="POST">
                            <label for="numemploye">N° d'employé :</label>
                            <input type="text" id="numemploye" name="numemploye"><br>                          
                            <input type="submit" value="Valider">
                        </form>
                    </div>

                    <div class="tab-pane" id="reservation">
                        <h3>Réservation</h3>
                        <form action="/affichageReservationController" method="POST">
                            <label for="numreservation">N° de réservation :</label>
                            <input type="text" id="numreservation" name="numreservation"><br>
                            <input type="submit" value="Valider">
                        </form>
                    </div>

                    <div class="tab-pane" id="client">
                        <h3>Client</h3>
                        <form action="/affichageClientController" method="POST">
                            <label for="numclient">N° de client :</label>
                            <input type="text" id="numclient" name="numclient"><br>
                            <input type="submit" value="Valider">
                        </form>
                    </div>
                </div>

                <!-- Ci-dessous le JavaScript pour la navigation en onglets --> 
                <script src="http://code.jquery.com/jquery-latest.js"></script>
                <script src="js/bootstrap.js"></script>
            </div>
            
            <div id="footer">
                <?php
                include './include/footer.php';
               ?>
           </div> 
        </div>
    </body>

</html>
