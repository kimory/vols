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
        <!-- règle le problème de compatibilité avec les versions d'IE antérieures à IE9-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
                    ?>
                </div>
                
		<?php include('include/formulaire_auth_admin.php'); ?>
            </div>
			
            <div id="developpement">
                 <div id="connectionuser">
                    <?php
                    include('include/formulaire_connexion_client.php');
                    ?>
                 </div>
                
                <div id="errorrecherche">
                  
                    <ul>
                        <?php if (isset($_SESSION['messages'])) : ?>
                            <?php foreach ($_SESSION['messages'] as $value) : ?>
                                <li><?php echo $value ?></li>
                            <?php endforeach; ?>
                    </ul>
                            <?php
                            // On détruit les messages en session une fois
                            // qu'ils ont été affichés.
                            unset($_SESSION['messages']);
                        endif; ?>
                    
                    <?php
                    if (isset($_SESSION['message_nb_passagers']) && strlen($_SESSION['message_nb_passagers']) > 0) : ?>
                        <p><?php echo $_SESSION['message_nb_passagers']; ?></p>
                        <?php 
                        // On détruit le message en session une fois
                        // qu'il a été affiché.
                        unset($_SESSION['message_nb_passagers']);
                    endif; ?>
                    
                </div>
                
                <div id="recherche">
                    <form action="/PropositionsC" method="POST" >
                        <fieldset>
                            <h5>Votre sélection</h5>

                            <label for ="villedepart">Ville de départ</label>
                            <input type="text" name="villedepart" id="villedepart" value="<?php 
                                 if(isset($_SESSION['villedepart']))
                                 {
                                    // la valeur par défaut est celle précédemment
                                    // saisie si elle existe.
                                    echo $_SESSION['villedepart'];
                                    unset($_SESSION['villedepart']);
                                 }?>">

                            <label for ="villearrivee">Ville d'arrivée</label>
                            <input type="text" name="villearrivee" id="villearrivee" value="<?php 
                                 if(isset($_SESSION['villearrivee']))
                                 {
                                    // la valeur par défaut est celle précédemment
                                    // saisie si elle existe.
                                    echo $_SESSION['villearrivee'];
                                    unset($_SESSION['villearrivee']);
                                 }?>">                                
                            <br>
                                     
                            <div id="date">
                                <label for ="datedepart">Date de départ (jj/mm/aaaa) </label>                        
                                <input type="text" id="jour" name="jour" value="<?php 
                                     if(isset($_SESSION['jour']))
                                     {
                                             // la valeur par défaut est celle précédemment
                                             // saisie si elle existe.
                                             echo $_SESSION['jour'];
                                             unset($_SESSION['jour']);
                                     }?>">                                      
                                 /
                                <input type="text" id="mois" name="mois" value="<?php 
                                     if(isset($_SESSION['mois']))
                                     {
                                             // la valeur par défaut est celle précédemment
                                             // saisie si elle existe.
                                             echo $_SESSION['mois'];
                                             unset($_SESSION['mois']);
                                     }?>">        
                                 /
                                <input type="text" id="annee" name="annee" value="<?php 
                                     if(isset($_SESSION['annee']))
                                     {
                                             // la valeur par défaut est celle précédemment
                                             // saisie si elle existe.
                                             echo $_SESSION['annee'];
                                             unset($_SESSION['annee']);
                                     }?>">
                                    <br>
                            </div>
                            <div id="date">    
                                <label for ="nbreadultes">Nombre d'adultes</label>
                                <input type='number' value="<?php 
                                     if(isset($_SESSION['nbreadultes']))
                                     {
                                        // la valeur par défaut est celle précédemment
                                        // saisie si elle existe
                                        echo $_SESSION['nbreadultes'];
                                        unset($_SESSION['nbreadultes']);
                                     }else{
                                        // ou "1" (cf un adulte au minimum doit voyager).
                                        echo "1";
                                     }
                                     ?>" min='1' max='50' name="nbreadultes" id="nbreadultes">

                                <label for ="nbreenfants">Nombre d'enfants (moins de 3 ans)</label>
                                <input type='number' value="<?php 
                                     if(isset($_SESSION['nbreenfants']))
                                     {
                                        // la valeur par défaut est celle précédemment
                                        // saisie si elle existe
                                        echo $_SESSION['nbreenfants'];
                                        unset($_SESSION['nbreenfants']);
                                     }else{
                                        // ou "0" (par défaut aucun enfant ne voyage).
                                        echo "0";
                                     }
                                     ?>" min='0' max='50' name="nbreenfants" id="nbreenfants"><br>
                            </div>
                                     
                            <input type="submit" value="valider">          
                            <input type="reset" value="annuler">

                        </fieldset>
                    </form>
                </div>
                
            </div>
            
            <div id="footer">
               <?php
                include VIEW . 'include/footer.php';
               ?>
            </div> 
        </div>
    </body>

</html>
