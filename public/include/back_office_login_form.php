<img id='logo' src='images/logo.jpg' alt='logo de DEVFLY' />
<?php
if(isset($_SESSION['login_admin']) && strlen($_SESSION['login_admin']) > 0) { ?>
	<button class="btn btn-large btn-primary" type="button"><a href='/deconnexionController' >Déconnexion</a></button>
	<?php 
} else {
	if(isset($_SESSION['message']) && strlen($_SESSION['message']) > 0) {
		echo $_SESSION['message'] . PHP_EOL;
		$_SESSION['message'] = '';
	}
	?>
	<form action="/backOfficeLoginController" method="POST" >
		<label for ="login">login</label>
			<input type="text" name="login" id="login">

		<label for ="passwd">password</label>
			<input type="password" name="passwd" id="passwd">

		<input type="submit" name="valider" id="valider" value="ok">          
	</form>
<?php 
} ?>
