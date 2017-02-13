<?php
	session_start();
	include 'functions.php';
	
	$id = $_GET['id'];
	$bdd = getBDD();
	$query = $bdd->query('SELECT * FROM kunde WHERE IDKunde = \''.$id.'\'');
	$user = $query->fetch();
	$_SESSION['id'] = $id;
	$_SESSION['username'] = $user['Username'];
	$_SESSION['email'] = $user['Email'];
	$_SESSION['namekunde'] = $user['Namekunde'];
	$_SESSION['stadt'] = $user['Stadt'];
	$_SESSION['plz'] = $user['PLZ'];
	$_SESSION['strasse'] = $user['Strasse'];
	$_SESSION['vorname'] = $user['Vorname'];
	$_SESSION['iban'] = $user['IBANKunde'];
	$_SESSION['type'] = $user['TypeKunde'];
	
	if($_SESSION['next'] == 'kaufen'){
		header('Location: ../view/bezahlungsart.php');
	}else{
		$_SESSION['next'] = 'start';
		header('Location: ../view/start_seite.php');
	}
?>