
<?php
include_once("../setup.php");

use entity\User;

if(User::isAdminConnected()) 
{
	// Si un administrateur est connecté, on lui propose de se déconnecter : 
?>
<div id="deconnexion">
<a href='/deconnexionController' ><button class="btn btn-large btn-primary" type="button">Déconnexion</button></a>
</div>
    <?php 
} 
else 
{
	// Si l'administrateur n'est pas connecté, il accède au formulaire de connexion :
?>
		
<?php
	// S'il y a eu une erreur lors de la tentative de connexion, elle est affichée ici :
	if(isset($_SESSION['message_login_admin']) && strlen($_SESSION['message_login_admin']) > 0) 
	{
		echo $_SESSION['message_login_admin'] . PHP_EOL;
		$_SESSION['message_login_admin'] = '';
	}
?>
                <div id="backoffice">
                  
		<form class="form-inline" action="/backOfficeLoginController" method="POST">
                    
			<label for ="login_admin">LOGIN</label>
			<input type="text" name="login_admin" id="login_admin">
                   
			<label for ="passwd">PASSWORD</label>
			<input type="password" name="passwd" id="passwd">
                        
                        <input type="submit" name="valider" id="valider" value="ok">          
		</form>
                 </div>
<?php 
} 
?>
