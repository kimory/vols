<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Recherche</title>
    </head>
    <body>
       <div id="supercontainer">
          <header>
            
           
          </header>
            <div id="container">
                 <form action="#" method="POST" id="formrecherche">
            <fieldset>
                <legend>Votre sélection</legend> 
                <label for ="villedepart">Ville de départ</label>
                <input type="text" name="villedepart" id="villedepart">
                <label for ="villearrivee">Ville d'arrivée</label>
                <input type="text" name="villearrivee" id="villearrivee"><br>
                <label for ="datedepart">Date de départ</label>                        
                    <input type="text" id="jour" name="jour" size="3" >/
                    <input type="text" id="mois" name="mois" size="3">/
                    <input type="text" id="annee" name="annee" size="3">
               <label for ="datedepart"> OU Date d'arrivée </label>          
                   <input type="text" id="jour" name="jour" size="3">/
                   <input type="text" id="mois" name="mois" size="3">/
                   <input type="text" id="annee" name="annee" size="3"><br>
                   <label for ="nbreadultes">Nombre d'adultes</label>
                   <input type='number' value="1" min='1' max='30' name="nbreadultes" id="nbreadultes">
                   <label for ="nbreenfants">Nombre d'enfants</label>
                   <input type='number' value="0" min='0' max='30' name="nbreenfants" id="nbreenfants"><br>
                   <div id="submit">
                   <input type="submit" name="valider" id="valider" value="valider">          
                   <input type="reset" name="annulation" value="annuler">
                   </div>
          
                   
                
            </fieldset>
            
        </form>
                
            </div>
            <footer>
                
            </footer>
       </div>
    </body>
    
</html>
