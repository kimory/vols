<?php
if (isset($_SESSION['login']) && strlen($_SESSION['login']) > 0) {
    
} else {
    ?>
    <form action="/userLoginController" method="POST" >
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
