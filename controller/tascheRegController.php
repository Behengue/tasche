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
	if(!(isset($_FILES['bild']['tmp_name']) AND file_exists($_FILES['bild']['tmp_name'][0]) AND $_FILES["bild"]["size"] < 1500000000
		AND in_array($extension_upload,$extensions_valides)))
		$err_bild = true;
	
	if(!(isset($beschreibung) AND strlen($beschreibung) <= 255))
		$err_beschreibung = true;
	
  	$bdd = getBDD();
	
	try{
		if($err_name OR $err_menge OR $err_preis OR $err_beschreibung OR $err_bild)
			header('Location: ../view/tascheRegistrieren.php?err_name='.$err_name.'&err_menge='.$err_menge.'&err_preis='.$err_preis.'&err_bild='
			.$err_bild.'&err_beschreibung='.$err_beschreibung);
		else{
			$extension_upload = strtolower(substr(strrchr($_FILES['bild']['name'], '.'), 1));
			$filename = $root_dir.''.md5($beschreibung.''.$menge.''.$name.''.$kategorie.''.$marke.''.$_FILES["bild"]["name"].''.date("Y/m/d_h:i:sa")).'.'.$extension_upload;
			
			$resultat = move_uploaded_file($_FILES['bild']['tmp_name'], $filename);
			$req = $bdd->prepare('INSERT INTO tasche (NameTasche, Menge, Preis, PATH, IDDesign, IDMarke, BeschreibungTasche)
				VALUES(:NameTasche, :Menge, :Preis, :PATH, :IDDesign, :IDMarke, :BeschreibungTasche)');
			$req->execute(array('NameTasche'=>$name, 'Menge'=>$menge, 'Preis'=>$preis, 'PATH'=>$filename, 'IDDesign'=>$design, 'IDMarke'=>$marke, 'BeschreibungTasche'=>$beschreibung));
			
			$req = $bdd->query('SELECT IDTasche FROM tasche WHERE PATH=\''.$filename.'\'');
			echo $filename;
			$id = $req->fetch()['IDTasche'];
			$req = $bdd->prepare('INSERT INTO hatkategorie (IDTasche, IDKategorie)
				VALUES(:IDTasche, :IDKategorie)');
			$req->execute(array('IDTasche'=>$id, 'IDKategorie'=>$kategorie));
			
			$req = $bdd->prepare('INSERT INTO hattype (IDTasche, IDType)
				VALUES(:IDTasche, :IDType)');
			$req->execute(array('IDTasche'=>$id, 'IDType'=>$type));
			header('Location: ../view/taschenVerwaltung.php?tasche_create=1');
		}
	}catch(Exception $e){
		die('Fehler:' .$e->getMessage());
	}
?>