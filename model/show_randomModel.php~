<?php
	$menge = (int)$_GET['nbarticle'];
	$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
	$query = $bdd->query('SELECT * FROM tasche');
	try{
		while($donnees = $query->fetch()){
			echo $donnees['Name'];
		}
		header('Location:../view/start_seite.php?donnees='.$donnees);
	}catch(Exception $e){
		die('Fehler:' .$e->getMessage());
	}
?>