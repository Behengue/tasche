<?php
	session_start();
	include 'functions.php';	
	
	$bdd = getBDD();
	if(!empty($_POST['typen'])){
		foreach($_POST['typen'] as $selected){
			$req = $bdd->exec("DELETE FROM hattype WHERE IDType=".$selected);
			$req = $bdd->exec("DELETE FROM type WHERE IDType=".$selected);
		}
	}
	header('Location: ../view/typeVerwaltung.php?delete_success=1');
?>
