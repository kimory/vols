<form action="/backOfficeLoginController" method="POST" >
<img src='../../divers/avions.jpeg' alt='logo de DEVFLY' />
<?php
if(isset($_SESSION['message']) && strlen($_SESSION['message']) > 0) {
	echo $_SESSION['message'] . PHP_EOL;

	$_SESSION['message'] = '';
}
?>
	<label for ="login">login</label>
		<input type="text" name="login" id="login">

	<label for ="passwd">password</label>
		<input type="password" name="passwd" id="passwd">

	<input type="submit" name="valider" id="valider" value="ok">          
</form>
