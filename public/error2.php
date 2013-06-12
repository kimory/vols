<?php 
if (!isset($_SESSION)) {
    session_start();
}
?>

<? header("HTTP/1.1 401 UNAUTHORIZED"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>DEV-FLY - Erreur</title>
    </head>
    <body>
        <h1>Erreur</h1>
        
        <p>Vous devez être connecté pour accéder à cette page !</p>
        
        <p>En cas de problème, merci de contacter l'administrateur du site.</p>
        <p><a href="/">retour à l'accueil</a></p>
        
    </body>
</html>
