<?php
	session_start();
	include 'functions.php';	
	
	$bdd = getBDD();
	if(!empty($_POST['design'])){
		foreach($_POST['design'] as $selected){
			$req = $bdd->exec("UPDATE tasche SET IDDesign=NULL WHERE IDDesign=".$selected);
			$req = $bdd->exec("DELETE FROM design WHERE IDDesign=".$selected);
		}
	}
	header('Location: ../view/designVerwaltung.php?delete_success=1');
?>
