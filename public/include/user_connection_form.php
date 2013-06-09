<?php
// Si l'utilisateur est connecté, on lui propose un bouton de déconnexion
if (isset($_SESSION['login']) && strlen($_SESSION['login']) > 0) {
	?>
	<a href='/deconnexionController' ><button class="btn btn-large btn-primary" type="button">Déconnexion</button></a>
	<?php
// Si l'utilisateur n'est pas connecté, on lui propose de se connecter
} else {
    ?>
    <form action="/clientLoginController" method="POST" >
        <fieldset>
            <legend>Connexion Utilisateur</legend>
            <?php
            if (isset($_SESSION['message']) && strlen($_SESSION['message']) > 0) {
                echo $_SESSION['message'] . PHP_EOL;
                $_SESSION['message'] = '';
            }
            ?>
            <label for ="login">login</label>
            <input type="text" name="login" id="login">

            <label for ="passwd">password</label>
            <input type="password" name="passwd" id="passwd">

            <input type="submit" value="ok">          
        </fieldset>
    </form>
    <?php }
?>
