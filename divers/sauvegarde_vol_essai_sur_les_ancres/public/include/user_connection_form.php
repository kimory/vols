<?php
// Si l'utilisateur est connecté, on voit un bouton de déconnexion
include_once("../setup.php");

use entity\Client;

if (Client::isClientConnected())
{
?>
<div id="deconnexionuser">
	<a href='/deconnexionController' ><button class="btn btn-large btn-primary" type="button">Déconnexion</button></a>
</div>
 <?php
	// Si l'utilisateur n'est pas connecté, on lui propose de se connecter
} 
else 
{
?>      <div id="utilisateur">
	<form class="form-inline" action="/clientLoginController" method="POST" >
		
	       
<?php
	if (isset($_SESSION['message_login_client']) && strlen($_SESSION['message_login_client']) > 0) 
	{
		echo $_SESSION['message_login_client'] . PHP_EOL;
		$_SESSION['message_login_client'] = '';
	}
?>
                     <fieldset>
                         Connexion Utilisateur : &nbsp;&nbsp;&nbsp;
			<label for ="login_client">login</label>
			<input type="text" name="login" id="login_client">

			<label for ="passwd_client">password</label>
			<input type="password" name="passwd" id="passwd_client">

			<input type="submit" value="ok">          
		</fieldset>
	</form>
     </div>
<?php 
}
?>