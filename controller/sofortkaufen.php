<?php
	session_start();
	
	//sauvegade des donnees
	$_SESSION['idt'] = $_GET['idt'];
	$_SESSION['menget'] = $_POST['menget'];
	if(!isset($_SESSION['id'])){
		$_SESSION['next'] = 'kaufen';
		header('Location: ../view/anmelden.php');
	}else{
		$idt = $_GET['idt'];
		$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
		$query = $bdd->query('SELECT menge FROM tasche WHERE IDtasche = \''.$idt.'\'');
		$data = $query->fetch();
		$menge = $data['menge'];
		echo $menge;
		header('Location: ../view/bezahlungsart.php');
		
	}
?>