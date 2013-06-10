<?php
// Si l'utilisateur est connecté, on voit un bouton de déconnexion
include_once("../setup.php");

use entity\Client;
use entity\User;

if (Client::isClientConnected()) 
{
?>
	<a href='/deconnexionController' ><button class="btn btn-large btn-primary" type="button">Déconnexion</button></a>
<?php
	// Si l'utilisateur n'est pas connecté, on lui propose de se connecter
} 
else 
{
?>
	<form action="/clientLoginController" method="POST" >
		<fieldset>
			<legend>Connexion Utilisateur</legend>
<?php
	if (isset($_SESSION['message_login_client']) && strlen($_SESSION['message_login_client']) > 0) 
	{
		echo $_SESSION['message_login_client'] . PHP_EOL;
		$_SESSION['message_login_client'] = '';
	}
?>
			<label for ="login">login</label>
			<input type="text" name="login" id="login">

			<label for ="passwd">password</label>
			<input type="password" name="passwd" id="passwd">

			<input type="submit" value="ok">          
		</fieldset>
	</form>
<?php 
}
?>
