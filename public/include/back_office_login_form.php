<img id='logo' src='/images/logo.jpg' alt='logo de DEV-FLY' />
<?php
        include_once("../setup.php");

        use entity\Client;
        // Ce fichier est inclus sur les différentes vues, on place ici les fonctions utilisées sur ces vues
	Client::isClientConnected();
//        function isClientConnected() {
//		return (isset($_SESSION['login']) && strlen($_SESSION['login']) > 0);
//	}
	function isAdminConnected() {
		return (isset($_SESSION['login_admin']) && strlen($_SESSION['login_admin']) > 0);
	}

	if(isAdminConnected()) {
	// Si un administrateur est connecté, on lui propose de se déconnecter : ?>
		<a href='/deconnexionController' ><button class="btn btn-large btn-primary" type="button">Déconnexion</button></a>
		<?php 
	} else {
	// Si l'administrateur n'est pas connecté, il accède au formulaire de connexion :
	?>
		<p>Connexion administrateur</p>
		<?php
		// S'il y a eu une erreur lors de la tentative de connexion, elle est affichée ici :
		if(isset($_SESSION['message_login_admin']) && strlen($_SESSION['message_login_admin']) > 0) {
			echo $_SESSION['message_login_admin'] . PHP_EOL;
			$_SESSION['message_login_admin'] = '';
		}
		?>
		<form action="/backOfficeLoginController" method="POST" >
			<label for ="login_admin">login</label>
				<input type="text" name="login_admin" id="login_admin">

			<label for ="passwd">password</label>
				<input type="password" name="passwd" id="passwd">

			<input type="submit" name="valider" id="valider" value="ok">          
		</form>
	<?php 
	} 
?>
