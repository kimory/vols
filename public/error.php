<?php
if (!isset($_SESSION)) {
    session_start();
}; ?>

<? header("HTTP/1.1 500 INTERNAL SERVER ERROR"); ?>
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
        <p>La page que vous cherchez n'a pas pu s'afficher correctement !<br>
        Nous vous invitons à réessayer.</p>
        
        <p>Si l'erreur persiste, merci de contacter l'administrateur du site.</p>
        <p><a href="/">retour à l'accueil</a></p>
        
    </body>
</html>
