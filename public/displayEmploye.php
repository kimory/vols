<?php 
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <title>DEV-FLY - Détails de l'employé</title>
    </head>
    <body>
		<?php 
			// ici on affichera le bouton de déconnexion
			include('include/back_office_login_form.php');
		?>
        <form action="/affichageEmployeController" method="POST">
            <label for="numemploye">Nouveau numéro d'employé :</label>
            <input type="text" id="numemploye" name="numemploye"><br>
            <input type="submit" value="OK">
        </form>
        
        <?php // On affiche le message d'erreur le cas échéant :
              if (isset($message) && strlen($message) > 0) : ?>
                <p><?php echo $message ?></p>
                
        <?php // Si il n'y a pas d'erreur, on affiche les informations sur l'employé recherché :
              else : ?>
        
                <div><h3>Description de l'employé</h3></div>

            <!-- Remarque : le htmlentities est une sécurité, il convertit les caractères
            spéciaux en entités HTML -->
            <div>
                <p>N° employé : <?php 
                    echo htmlentities($employe->getId(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Civilité : <?php 
                    echo htmlentities($employe->getCivilite(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Nom : <?php 
                    echo htmlentities($employe->getNom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Prénom : <?php 
                    echo htmlentities($employe->getPrenom(), ENT_QUOTES, 'UTF-8') ?></p>
                <p>Fonction : <?php 
                    echo htmlentities($employe->getFonction(), ENT_QUOTES, 'UTF-8') ?></p>
                <p><a href="/affichageDesVolsController/action/<?php 
                    echo htmlentities($employe->getId(), ENT_QUOTES, 'UTF-8')?>">Voir les vols attribués à cet employé</a></p>
            </div>
            
        <?php endif; ?>
                
        <div><a href="/choixducritere">retour au choix du critère</a></div>
        
    </body>
    
</html>
