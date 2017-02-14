<?php
	session_start();
	include 'functions.php';
	
	$err_name = false;
	$err_bezeichnung = false;
	
	$name = htmlspecialchars($_POST['name']);
	$bezeichnung = htmlspecialchars($_POST['bezeichnung']);
	
	if(!(isset($name) AND preg_match("#^([a-zA-ZäÄöÖüÜß]{1,1}([a-zA-Z\-äÄöÖüÜß ]){2,100})$#", $name)))
		$err_name = true;
	
	if(!(isset($bezeichnung) AND strlen($bezeichnung) <= 255))
		$err_bezeichnung = true;
	
  	$bdd = getBDD();
	
	try{
		if($err_name OR $err_bezeichnung)
			header('Location: ../view/markeEdit.php?err_name='.$err_name.'&err_bezeichnung='.$err_bezeichnung);
		else{
			$req = $bdd->prepare('UPDATE marke SET NameMarke=:NameMarke, BezeichnungMarke=:BezeichnungMarke WHERE IDMarke=:IDMarke');
			$req->execute(array('NameMarke'=>$name, 'BezeichnungMarke'=>$bezeichnung, 'IDMarke'=>$_GET['idm']));
			
			header('Location: ../view/markeVerwaltung.php?marke_edit=1');
		}
	}catch(Exception $e){
		die('Fehler:' .$e->getMessage());
	}
?>
