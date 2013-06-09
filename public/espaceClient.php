<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <title>DEV-FLY - Espace Client</title>
    </head>
    <body>
        <div id="supercontainer">
            <header>
				<?php include('include/back_office_login_form.php'); ?>
            </header>
				<?php 
				$_SESSION['page_actuelle'] = 'Espace Client';
				include('include/menu_front_office.php');
				include('include/user_connection_form.php');
				?>

<?php
				// Si l'utilisateur n'est pas connecté
				if( ! isClientConnected()) {
					// affichage de la création d'un compte client
					include('include/create_user_form.php');
					// Si le client est connecté, on affiche ses réservations
				} else {
					// affichage de la liste des réservations du client
?>
				<a href='/reservationsController' ><button class="btn btn-large btn-primary" type="button">Voir ses réservations</button></a>

<?php
					// Si la variable ci-dessous existe, alors on demande 
					// à afficher les réservations
					if(isset($_SESSION['resultat_liste_reservations']))
					{
						// Le tableau contient des éléments, on l'affiche
						if( count($_SESSION['resultat_liste_reservations']) > 0) 
						{
?>
							<table>
								<tr>
									<th>Numéro de réservation</th>
									<th>Date de réservation</th>
									<th>Lieu de départ</th>
									<th>Lieu d'arrivée</th>
									<th>Date de départ</th>
								</tr>
<?php
							// affichage de toutes les lignes
							foreach($_SESSION['resultat_liste_reservations'] as $row) 
							{
								echo "<tr>";
								echo '<td><a href="/reservationDetailsController/action/' . 
									$row['numreservation'] .'">' . $row['numreservation'] . '</a></td>';
								echo "<td>" . $row['datereservation'] . "</td>";
								echo "<td>" . $row['lieudepart'] . "</td>";
								echo "<td>" . $row['lieuarrivee'] . "</td>";
								echo "<td>" . $row['datedepart'] . "</td>";
								echo "</tr>";
							}
?>
							</table>
<?php
						}
						// Le tableau ne contient pas d'éléments
						else
						{ 
							echo "<p>Vous n'avez pas passé de réservation jusqu'à présent.</p>";
						}
						// Une fois que nous avons affiché ce qu'il y 
						// avait dans cette variable, on la supprime
						unset($_SESSION['resultat_liste_reservations']) ;
					}

					// Sinon si la variable ci-dessous existe, alors 
					// on veut afficher les détails d'une réservation
					else if (isset($_SESSION['resultat_infos_reservation']))
					{
						// S'il y a une erreur, on l'affiche puis on la supprime
						if(isset($_SESSION['error_message']) && 
							strlen($_SESSION['error_message']) > 0)
						{
							echo $_SESSION['error_message'];
							unset($_SESSION['error_message']);
							unset($_SESSION['resultat_infos_reservation']) ;
						}
						else
						{
?>

							<table>
								<tr>
									<th>Numéro de réservation</th>
									<th>Date de réservation</th>
									<th>Lieu de départ</th>
									<th>Lieu d'arrivée</th>
									<th>Date de départ</th>
									<th>Prix</th>
									<th>Numéro de place</th>
									<th>Numéro de passager</th>

								</tr>
<?php
							// On affiche toutes les lignes
							foreach($_SESSION['resultat_infos_reservation'] as $row) 
							{
								echo '<tr>';
								echo '<td>' . $row['numreservation'] . '</td>';
								echo '<td>' . $row['datereservation'] . '</td>';
								echo '<td>' . $row['lieudepart'] . '</td>';
								echo '<td>' . $row['lieuarrivee'] . '</td>';
								echo '<td>' . $row['datedepart'] . '</td>';
								echo '<td>' . $row['prix'] . '</td>';
								echo '<td>' . $row['numeroplace'] . '</td>';
								echo '<td>' . $row['numeropassager'] . '</td>';
								echo '</tr>';
							}
							echo '</table>';
							unset($_SESSION['resultat_infos_reservation']) ;
						}
					}
				}
?>
            <footer>

            </footer>
        </div>
    </body>

</html>
