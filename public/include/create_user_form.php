<?php
include_once("../setup.php");

use entity\Client;

if (! Client::isClientConnected()) :

	// on enregistre la page sur laquelle on se trouvait avant celle-ci
	// si nous n'avons pas déjà entré une URL
	// pour y aller une fois l'inscription faite
	if(!isset($_SESSION['pagesurlaquelleondoitaller']))
	{
		$_SESSION['pagesurlaquelleondoitaller'] = $_SERVER['HTTP_REFERER'];
	}


	if(isset($_SESSION['messages'])) :
		foreach($_SESSION['messages'] as $mes) :
		?>
			<p><?php echo $mes; ?></p>
		<?php
		endforeach;
		unset($_SESSION['messages']);
	endif;
    ?>
    <form action="/createUserController" method="POST" >
        <fieldset>
            <h5>S'inscrire</h5>

            <select name='civilite' id='civilite' >
                <option value="m">Monsieur</option>
                <option value="mme">Madame</option>
            </select>

            <label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" value="<?php 
				if(isset($_SESSION['inscription_nom']))
				{
					echo $_SESSION['inscription_nom'];
				}?>">
            <label for="prenom">Prénom</label>
			<input type="text" name="prenom" id="prenom"  value="<?php 
				if(isset($_SESSION['inscription_prenom']))
				{
					echo $_SESSION['inscription_prenom'];
				}?>">
            <label for="adresse">Adresse</label>
			<input type="text" name="adresse" id="adresse" value="<?php 
				if(isset($_SESSION['inscription_adresse']))
				{
					echo $_SESSION['inscription_adresse'];
				}?>">
            <label for="code_postal">Code postal</label>
			<input type="text" name="code_postal" id="code_postal" value="<?php 
				if(isset($_SESSION['inscription_code_postal']))
				{
					echo $_SESSION['inscription_code_postal'];
				}?>">
            <label for="ville">Ville</label>
			<input type="text" name="ville" id="ville" value="<?php 
				if(isset($_SESSION['inscription_ville']))
				{
					echo $_SESSION['inscription_ville'];
				}?>">
            <label for="pays">Pays</label>
			<input type="text" name="pays" id="pays" value="<?php 
				if(isset($_SESSION['inscription_pays']))
				{
					echo $_SESSION['inscription_pays'];
				}?>">
            <label for="email">E-mail</label>
			<input type="text" name="email" id="email" value="<?php 
				if(isset($_SESSION['inscription_email']))
				{
					echo $_SESSION['inscription_email'];
				}?>">
            <label for="telfixe">Téléphone fixe</label>
			<input type="text" name="telfixe" id="telfixe" value="<?php 
				if(isset($_SESSION['inscription_telfixe']))
				{
					echo $_SESSION['inscription_telfixe'];
				}?>">
            <label for="telportable">Téléphone portable</label>
			<input type="text" name="telportable" id="telportable" value="<?php 
				if(isset($_SESSION['inscription_telportable']))
				{
					echo $_SESSION['inscription_telportable'];
				}?>">

            <label for="login">Choisissez un identifiant :</label>
			<input type="text" name="login" id="login" value="<?php 
				if(isset($_SESSION['inscription_login']))
				{
					echo $_SESSION['inscription_login'];
				}?>">

            <label for ="password1">Choisissez un mot de passe : </label>
            <input type="password" name="password1" id="password1"><br/>
            
            <label for ="password2">Confirmez le mot de passe : </label>
            <input type="password" name="password2" id="password2"><br>

            <input type="submit" value="valider"> 
            <input type="reset" value="annuler">        

        </fieldset>
    </form>
       
    <?php endif;

		unset($_SESSION['inscription_civilite']);
		unset($_SESSION['inscription_nom']);
		unset($_SESSION['inscription_prenom']);
		unset($_SESSION['inscription_adresse']);
		unset($_SESSION['inscription_code_postal']);
		unset($_SESSION['inscription_ville']);
		unset($_SESSION['inscription_pays']);
		unset($_SESSION['inscription_email']);
		unset($_SESSION['inscription_telfixe']);
		unset($_SESSION['inscription_telportable']);
		unset($_SESSION['inscription_login']);
?>
