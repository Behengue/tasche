<?php
	session_start();
	include 'functions.php';	
	
	$bdd = getBDD();
	if(!empty($_POST['taschen'])){
		foreach($_POST['taschen'] as $selected){
			$req = $bdd->exec("DELETE FROM hatkategorie WHERE IDTasche=".$selected);
			$req = $bdd->exec("DELETE FROM hattype WHERE IDTasche=".$selected);
			$req = $bdd->exec("DELETE FROM tasche WHERE IDTasche=".$selected);
		}
	}
	header('Location: ../view/taschenVerwaltung.php?delete_success=1');
?>