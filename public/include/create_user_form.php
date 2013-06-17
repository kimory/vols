<?php
include_once("../setup.php");

use entity\Client;

if (! Client::isClientConnected()) :
    ?>
    <form action="/createUserController" method="POST" >
        <fieldset>
            <h5>S'inscrire</h5>

            <select name='civilite' id='civilite' >
                <option value="m">Monsieur</option>
                <option value="mme">Madame</option>
            </select>

            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse">
            <label for="code_postal">Code postal</label>
            <input type="text" name="code_postal" id="code_postal">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville">
            <label for="pays">Pays</label>
            <input type="text" name="pays" id="pays">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email">
            <label for="telfixe">Téléphone fixe</label>
            <input type="text" name="telfixe" id="telfixe">
            <label for="telportable">Téléphone portable</label>
            <input type="text" name="telportable" id="telportable">

            <label for="login">Choisissez un identifiant :</label>
            <input type="text" name="login" id="login">

            <label for ="passwd1">Choisissez un mot de passe : </label>
            <input type="password" name="passwd1" id="passwd1"><br/>

            <input type="submit" value="valider"> 
            <input type="reset" value="annuler">        

        </fieldset>
    </form>
       
    <?php endif;
?>
