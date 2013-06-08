<?php session_start(); ?>
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $villedepart = $_POST['villedepart'];
    $villearrivee = $_POST['villearrivee'];
    $datedepart = $_POST['datedepart'];
    $nbreadultes = $_POST['nbreadultes'];
    $nbreenfants = $_POST['nbreenfants'];
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>proposition</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div id="supercontainer">
            <header>

            </header>
            <div id="container">
               
                <div class="h6">                   
                    <h6>Votre sélection</h6> 
                        <p>Vous partez de <?php echo $villedepart; ?> et vous arrivez à <?php echo $villearrivee; ?> .</p>
                        <p>Date de départ souhaitée :<?php echo $datedepart ?></p>
                        <p>Vous êtes <?php echo $nbreadultes ?> adultes et <?php echo $nbreenfants ?> enfants.</p>
                </div>                    
                </div>
                
                        <legend>Nos propositions</legend> 
                        <h5>Date de départ</h5>
                        Choix 1 "dateheure" "prix": <input type="radio" name="choix" value="1" checked><br>
                        Choix 2 "dateheure" "prix": <input type="radio" name="choix" value="2"><br>
                        Choix 3 "dateheure" "prix": <input type="radio" name="choix" value="3"><br>                       

                    
                <input  type="submit" value="valider">
                <input  type="reset" value="annuler">
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>