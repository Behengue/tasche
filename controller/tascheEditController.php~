<?php
	session_start();
	include 'functions.php';
	
	$root_dir = '../media/';
	$err_name = false;
	$err_menge = false;
	$err_preis = false;
	$err_bild = false;
	$err_beschreibung = false;
	
	$name = htmlspecialchars($_POST['name']);
	$menge = htmlspecialchars($_POST['menge']);
	$preis = htmlspecialchars($_POST['preis']);
	$kategorie = htmlspecialchars($_POST['kategorie']);
	$design = htmlspecialchars($_POST['design']);
	$marke = htmlspecialchars($_POST['marke']);
	$type = htmlspecialchars($_POST['type']);
	$beschreibung = htmlspecialchars($_POST['beschreibung']);
	
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	$extension_upload = strtolower(  substr(  strrchr($_FILES['bild']['name'], '.')  ,1)  );
	
	if(!(isset($name) AND preg_match("#^([a-zA-ZäÄöÖüÜß]{1,1}([a-zA-Z\-äÄöÖüÜß ]){2,100})$#", $name)))
		$err_name = true;
	
	if(!(isset($menge) AND intval($menge) >= 0))
		$err_menge = true;
	
	if(!(isset($preis) AND floatval($preis) > 0))
		$err_preis = true;
	
	$type_file = $_FILES['bild']['type'];
	if(!file_exists($_FILES['bild']['tmp_name'][0])){
		$err_bild = false;
		echo 77;
	}else{
		if(!(file_exists($_FILES['bild']['tmp_name'][0]) AND $_FILES["bild"]["size"] < 1500000000
		AND in_array($extension_upload,$extensions_valides)))
		$err_bild = true;
	}
	
	if(!(isset($beschreibung) AND strlen($beschreibung) <= 255))
		$err_beschreibung = true;
	
  	$bdd = getBDD();
	
	try{
		if($err_name OR $err_menge OR $err_preis OR $err_beschreibung OR $err_bild)
			header('Location: ../view/tascheEdit.php?err_name='.$err_name.'&err_menge='.$err_menge.'&err_preis='.$err_preis.'&err_bild='
			.$err_bild.'&err_beschreibung='.$err_beschreibung);
		else{
			if(file_exists($_FILES['bild']['tmp_name'][0])){
				$extension_upload = strtolower(substr(strrchr($_FILES['bild']['name'], '.'), 1));
				$filename = $root_dir.''.md5($beschreibung.''.$menge.''.$name.''.$kategorie.''.$marke.''.$_FILES["bild"]["name"].''.date("Y/m/d_h:i:sa")).'.'.$extension_upload;
			
				$resultat = move_uploaded_file($_FILES['bild']['tmp_name'], $filename);
				$req = $bdd->prepare('UPDATE tasche SET NameTasche=:NameTasche, Menge=:Menge, Preis=:Preis, PATH=:PATH, IDDesign=:IDDesign, IDMarke=:IDMarke,
					BeschreibungTasche=:BeschreibungTasche WHERE IDTasche=:IDTasche');
				$req->execute(array('NameTasche'=>$name, 'Menge'=>$menge, 'Preis'=>$preis, 'PATH'=>$filename, 'IDDesign'=>$design, 'IDMarke'=>$marke, 'BeschreibungTasche'=>$beschreibung, 'IDTasche'=>$_GET['idt']));
			
			}else{
				$req = $bdd->prepare('UPDATE tasche SET NameTasche=:NameTasche, Menge=:Menge, Preis=:Preis, IDDesign=:IDDesign, IDMarke=:IDMarke,
					BeschreibungTasche=:BeschreibungTasche WHERE IDTasche=:IDTasche');
				$req->execute(array('NameTasche'=>$name, 'Menge'=>$menge, 'Preis'=>$preis, 'IDDesign'=>$design, 'IDMarke'=>$marke, 'BeschreibungTasche'=>$beschreibung, 'IDTasche'=>$_GET['idt']));
			
			}
				$req = $bdd->query('SELECT IDTasche FROM tasche WHERE IDTasche='.$_GET['idt']);
				$data = $req->fetch();
				$id = $data['IDTasche'];
				$req = $bdd->prepare('UPDATE hatkategorie SET IDKategorie=:IDKategorie
					WHERE IDTasche=:IDTasche');
				$req->execute(array('IDKategorie'=>$kategorie, 'IDTasche'=>$_GET['idt']));
				
				$req = $bdd->prepare('UPDATE hattype SET IDType=:IDType
					WHERE IDTasche=:IDTasche');
				$req->execute(array('IDType'=>$type, 'IDTasche'=>$_GET['idt']));
			header('Location: ../view/taschenVerwaltung.php?tasche_edit=1');
		}
	}catch(Exception $e){
		die('Fehler:' .$e->getMessage());
	}
?>