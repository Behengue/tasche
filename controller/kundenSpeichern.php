<?php
	session_start();
	include 'functions.php';
	
	$err_name = false;
	$err_bezeichnung = false;
	
	$idKunden = $_POST['idKunden'];
	$typeKunden = $_POST['typeKunden'];
	
  	$bdd = getBDD();
	
	try{
		$i = 0;
		foreach($idKunden as $idKunde) {
			$req = $bdd->prepare('UPDATE kunde SET TypeKunde=:TypeKunde WHERE IDKunde=:IDKunde');
			$req->execute(array('TypeKunde'=>$typeKunden[$i], 'IDKunde'=>$idKunde));	
			if($idKunde == $_SESSION['id'])
				$_SESSION['type'] = $typeKunden[$i];
			$i++;
		}
		header('Location: ../view/userVerwaltung.php?kunden_edit=1');
	}catch(Exception $e){
		die('Fehler:' .$e->getMessage());
	}
?>
