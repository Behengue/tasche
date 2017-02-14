<?php
	session_start();
	include 'functions.php';	
	
	$bdd = getBDD();
	if(!empty($_POST['marken'])){
		foreach($_POST['marken'] as $selected){
			$req = $bdd->exec("UPDATE tasche SET IDMarke=NULL WHERE IDMarke=".$selected);
			$req = $bdd->exec("DELETE FROM marke WHERE IDMarke=".$selected);
		}
	}
	header('Location: ../view/markeVerwaltung.php?delete_success=1');
?>
