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
            <title>DEV-FLY - Billet</title>
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
                <?php
                // soit nous affichons un message d'erreur
                // soit la requête s'est bien passée, nous pouvons afficher le billet
                if (isset($message)) :
                    ?>
                    <div id="error">
                        <p><?php echo $message; ?></p>
                    </div>
                    <?php
                    // On détruit le message en session une fois
                    // qu'il a été affiché
                    unset($message);
                else : // il n'y a pas de message d'erreur : la requête s'est bien passée
                    ?>

                    <p>Voici les détails de votre billet :<br>
                    Numéro de vol : <?php echo $resultat['vol']['numvol']; ?> <br>
                    Date de départ : <?php echo $resultat['vol']['datedepart']; ?> <br>
                    Date d'arrivée : <?php echo $resultat['vol']['datearrivee']; ?> <br>
                    Lieu de départ : <?php echo $resultat['vol']['lieudep']; ?> <br>
                    Lieu d'arrivée : <?php echo $resultat['vol']['lieuarriv']; ?> <br>
                    </p>
                    <div id="billet">
                        <table>
                            <tr>
                                <th>Numéro de place</th>
                                <th>Prix</th>
                                <th>Civilite</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                            </tr>
                            <?php
                            foreach ($resultat['places'] as $passager) :
                            ?>
                                <!-- htmlentities convertit les caractères éligibles en entités HTML (sécurité) -->
                                <tr>
                                    <td><?php echo htmlentities($passager['numplace'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlentities($passager['prix'], ENT_QUOTES, 'UTF-8'); ?> €</td>
                                    <td><?php echo htmlentities(strtoupper($passager['civilite']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlentities($passager['nom'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlentities($passager['prenom'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlentities($passager['datenaissance'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </table>
                    </div>

                <?php
                endif;
                ?>
            </div>
            
            <div id="footer">
                <?php
                include VIEW . 'include/footer.php';
                ?>
            </div> 
        </div>
    </body>
</html>
