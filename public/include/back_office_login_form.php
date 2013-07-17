
<?php
include_once("../setup.php");

use entity\User;

if (User::isAdminConnected()) {
    // Si un administrateur est connecté, on lui propose de se déconnecter : 
    ?>
    <div id="deconnexionadmin">
        <a href='/choixducritere'><button class="btn btn-primary" type="button">Choix du critère</button></a>
        <a href='/deconnexionController'><button class="btn btn-large btn-primary" type="button">Déconnexion</button></a>
    </div>
    <?php
} else {
    // Si l'administrateur n'est pas connecté, il accède au formulaire de connexion :
    ?>

    <div id="backoffice">

        <form class="form-inline" action="/backOfficeLoginController" method="POST">
            Connexion administrateur: &nbsp;
            <label for ="login_admin">LOGIN</label>
            <input type="text" name="login_admin" id="login_admin">

            <label for ="passwd_admin">PASSWORD</label>
            <input type="password" name="passwd" id="passwd_admin">

            <input type="submit" name="valider" id="valider" value="ok">         
        </form>
        <div id="connectionadmin">		
    <?php
    // S'il y a eu une erreur lors de la tentative de connexion, elle est affichée ici :
    if (isset($_SESSION['message_login_admin']) && strlen($_SESSION['message_login_admin']) > 0) {
        echo $_SESSION['message_login_admin'] . PHP_EOL;
        $_SESSION['message_login_admin'] = '';
    }
    ?>
        </div>
    </div>

<?php
}
?>
