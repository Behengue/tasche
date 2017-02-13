<?php
	session_start();
	include 'functions.php';
	
	$ibankunde= $_POST['ibankunde'];
	
	if((isset($ibankunde) AND preg_match("#^([Dd]{1,1}[Ee]{1,1}[0-9]{20})$#", $ibankunde))){
		$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
		try{
			$req = $bdd->prepare('INSERT INTO Kauft(IDKunde, IDTasche, Datum, IBANKauft) VALUES(:IDKunde, :IDTasche, :Datum, :IBANKauf)');
			$req->execute(array('IDKunde'=>$_SESSION['id'],'IDTasche'=>$_SESSION['idt'],'Datum'=>date("Y/m/d_h:i:sa"), 'IBANKauf'=> $ibankunde));
		
			$menget = intval($_SESSION['menget']);
			$query = $bdd->query("SELECT Menge FROM tasche WHERE IDTasche=".$_SESSION['idt']);
			if($query != false){
				$donnee = $query->fetch();
				$old_menge = intval($donnee['Menge']);
				$new_menge = $old_menge - $menget;
				$query2 = $bdd->prepare("UPDATE tasche SET Menge=:NewMenge WHERE IDTasche=:IDTasche");
				$query2->execute(array('NewMenge' => $new_menge, 'IDTasche' => $_SESSION['idt']));
				
				$fest = $_POST['fest'];
				if($fest == 'ja'){
					echo $fest;
					$query2 = $bdd->prepare("UPDATE kunde SET IBANKunde=:NewIBAN WHERE IDKunde=:IDKunde");
					$query2->execute(array('NewIBAN' => $ibankunde, 'IDKunde' => $_SESSION['id']));
				}
			}
			warenEntfernen($_SESSION['idt']);
			header('Location: ../view/start_seite.php?kauf=1&idt='.$_SESSION['idt']);
		}catch(Exception $e){
			die('Fehler:' .$e->getMessage());
		}
	}else{
		header('Location: ../view/bezahlungsart.php?err_iban=1');
	}
	?>