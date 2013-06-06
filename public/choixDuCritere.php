<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Choix du critère</title>
    </head>
    <body>
       
        <ul class="nav nav-tabs">
            <li class="active"><a href="#vol" data-toggle="tab">Vol</a></li>
            <li><a href="#passager" data-toggle="tab">Passager</a></li>
            <li><a href="#employe" data-toggle="tab">Employé</a></li>
            <li><a href="#reservation" data-toggle="tab">Réservation</a></li>
            <li><a href="#client" data-toggle="tab">Client</a></li>
        </ul>

        <div class="tab-content">
            <section class="tab-pane active" id="vol">
                <h3>Vol</h3>
                <form action="/affichageVolController" method="POST">
                    <label for="numvol">N° de vol :</label>
                    <input type="text" id="numvol" name="numvol"><br>
                    <input type="submit" value="Valider">
                </form>
            </section>

            <section class="tab-pane" id="passager">
                <h3>Passager</h3>
                <form action="/affichagePassagerController" method="POST">
                    <label for="numpassager">N° de passager :</label>
                    <input type="text" id="numpassager" name="numpassager"><br>
                    <input type="submit" value="Valider">
                </form>
            </section>

            <section class="tab-pane" id="employe">
                    <h3>Employé</h3>
                    <form action="/affichageEmployeController" method="POST">
                        <label for="numemploye">N° d'employé :</label>
                        <input type="text" id="numemploye" name="numemploye"><br>
                          
                        <label for="fonction"><br>
                            Sélectionnner la fonction de l'employé recherché :
                        </label>
                        <select name="fonction" id="fonction">
                            <option value="pilote">Pilote</option>
                            <option value="copilote">Copilote</option>
                            <option value="hotesse">Hôtesse</option>
                            <option value="steward">Steward</option>
                        </select><br>
                            
                        <input type="submit" value="Valider">
                    </form>
            </section>

            <section class="tab-pane" id="reservation">
                    <h3>Réservation</h3>
                    <form action="/affichageReservationController" method="POST">
                        <label for="numreservation">N° de réservation :</label>
                        <input type="text" id="numreservation" name="numreservation"><br>
                        <input type="submit" value="Valider">
                    </form>
            </section>

            <section class="tab-pane" id="client">
                    <h3>Client</h3>
                    <form action="/affichageClientController" method="POST">
                        <label for="numclient">N° de client :</label>
                        <input type="text" id="numclient" name="numclient"><br>
                        <input type="submit" value="Valider">
                    </form>
            </section>
        </div>
        
    <!-- Ci-dessous le JavaScript pour la navigation en onglets --> 
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.js"></script>
    </body>
    
</html>
