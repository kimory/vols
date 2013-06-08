<?php
if( ! isset($_SESSION['login']) || strlen($_SESSION['login']) <= 0) { 
?>
	<form action="/createUserController" method="POST" >
		<fieldset>
		<legend>S'inscrire</legend>

		<select name='civilite' id='civilite' >
			<option value="m">Monsieur</option>
			<option value="mme">Madame</option>
		</select>

		<label for="nom">nom</label>
			<input type="text" name="nom" id="nom">
		<label for="prenom">prenom</label>
			<input type="text" name="prenom" id="prenom">
		<label for="adresse">adresse</label>
			<input type="text" name="adresse" id="adresse">
		<label for="code_postal">code_postal</label>
			<input type="text" name="code_postal" id="code_postal">
		<label for="ville">ville</label>
			<input type="text" name="ville" id="ville">
		<label for="pays">pays</label>
			<input type="text" name="pays" id="pays">
		<label for="email">email</label>
			<input type="text" name="email" id="email">
		<label for="telfixe">telfixe</label>
			<input type="text" name="telfixe" id="telfixe">
		<label for="telportable">telportable</label>
			<input type="text" name="telportable" id="telportable">

		<label for="login">Identifiant :</label>
			<input type="text" name="login" id="login">

		<label for ="passwd">Mot de passe : </label>
			<input type="password" name="passwd" id="passwd">
		<label for ="passwd">Confirmez le mot de passe : </label>
			<input type="password" name="passwd" id="passwd">

		<input type="reset" name="reset" id="reset" value="annuler">          
		<input type="submit" name="valider" id="valider" value="ok">          

		</fieldset>
	</form>
<?php 
} ?>
