<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav">
			<li <?php
// La partie du menu qui est "sélectionnée" (visuellement) doit être celle qui correspond à la page actuelle :
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Accueil') == 0){
echo 'class="active"' ; 
}?>
                ><a href="#">Accueil</a></li>
			<li <?php 
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Espace Client') == 0)
	echo 'class="active"';
?>><a href="#">Espace Client</a></li>
			<li <?php 
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Qui sommes-nous ?') == 0)
	echo 'class="active"';
?>><a href="/quisommesnous">Qui sommes-nous ?</a></li>
			<li <?php 
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Contact') == 0)
	echo 'class="active"';
?>><a href="#">Contact</a></li>
		</ul>
	</div>
</div>
