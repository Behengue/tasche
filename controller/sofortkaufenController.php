<?php
	session_start();
	
	$iban= $_GET['iban'];
	$query = $bdd->query('SELECT iban FROM kunde WHERE IDkunde = \''.$idk.'\'');
	$tasche = $query->fetch();
	
	if ($menge < "1") {
    header('Location: ../view/start_seite.php');
} else {
    header('Location: ../view/sofortkaufenController.php');
}
	
?>