<div id="menu">
	<ul class="nav nav-tabs">
		<li <?php
// La partie du menu qui est "sélectionnée" (visuellement) doit être celle qui correspond à la page actuelle :
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Vol') == 0){
	echo 'class="active"';
}?>><a href="/choixducritere/vol" data-toggle="tab">Vol</a></li>
		<li <?php
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Passager') == 0){
	echo 'class="active"';
}?>><a href="/choixducritere/passager" data-toggle="tab">Passager</a></li>
		<li <?php
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Employé') == 0){
	echo 'class="active"';
}?>><a href="/choixducritere/employe" data-toggle="tab">Employé</a></li>
		<li <?php
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Réservation') == 0){
	echo 'class="active"';
}?>><a href="/choixducritere/reservation" data-toggle="tab">Réservation</a></li>
		<li <?php
if(isset($_SESSION['page_actuelle']) && strcmp($_SESSION['page_actuelle'], 'Client') == 0){
	echo 'class="active"';
}?>><a href="/choixducritere/client" data-toggle="tab">Client</a></li>
	</ul>
</div>
