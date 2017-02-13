<?php
	session_start();
	include 'functions.php';	
	
	$bdd = getBDD();
	if(!empty($_POST['kategorien'])){
		foreach($_POST['kategorien'] as $selected){
			$req = $bdd->exec("DELETE FROM hatkategorie WHERE IDKategorie=".$selected);
			$req = $bdd->exec("DELETE FROM kategorie WHERE IDKategorie=".$selected);
		}
	}
	header('Location: ../view/kategorieVerwaltung.php?delete_success=1');
?>