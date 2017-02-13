<?php
	$err_name = false;
	$err_vorname = false;
	$err_strasse = false;
	$err_stadt = false;
	$err_plz = false;
	$err_email = false;
	$err_username = false;
	$err_pwd = false;
	$err_repwd = false;
	$err_ibank = false;
	
	$err_user_exist = false;
	
	$name = htmlspecialchars($_POST['name']);
	$vorname = htmlspecialchars($_POST['vorname']);
	$strasse = htmlspecialchars($_POST['strasse']);
	$stadt = htmlspecialchars($_POST['stadt']);
	$plz = htmlspecialchars($_POST['plz']);
	$email = htmlspecialchars($_POST['email']);
	$username = htmlspecialchars($_POST['username']);
	$pwd = htmlspecialchars($_POST['pwd']);
	$repwd = htmlspecialchars($_POST['repwd']);
	$ibank = htmlspecialchars($_POST['ibank']);
	
	
	if(!(isset($name) AND preg_match("#^([a-zA-Z]{1,1}([a-zA-Z\- ]){2,100})$#", $name)))
		$err_name = true;
	
	if(!(isset($vorname) AND preg_match("#^([a-zA-Z]{1,1}([a-zA-Z\- ]){2,100})$#", $vorname)))
		$err_vorname = true;
	
	if(!(isset($strasse) AND preg_match("#^(^([a-zA-Z]){4,100}(\.)? [0-9]{1,4}[a-zA-Z]{0,3})$#", $strasse)))
		$err_strasse = true;
	
	if(!(isset($plz) AND preg_match("#^([0-9]{5})$#", $plz)))
		$err_plz = true;
	
	if(!(isset($stadt) AND preg_match("#^([a-zA-Z]{1,1}([a-zA-Z\- ]){2,100})$#", $stadt)))
		$err_stadt = true;
	
	if(!(isset($email) AND preg_match("#^([a-zA-Z]{1,1}([a-zA-Z0-9\.\_\-]){2,60}@[a-zA-Z]{1,1}([a-zA-Z0-9\.\_\-]){2,40}\.[a-zA-Z]{1,5})$#", $email)))
		$err_email = true;

	if(!(isset($username) AND preg_match("#^([a-zA-Z]{1,1}([a-zA-Z\-\.\_]){2,100})$#", $username)))
		$err_username = true;

	if(!(isset($pwd) AND preg_match("#^(.{8,20})$#", $pwd)))
		$err_pwd = true;

	if($repwd != $pwd)
		$err_repwd = true;
	
	if(!(isset($ibank) AND preg_match("#^([Dd]{1,1}[Ee]{1,1}[0-9]{20})$#", $iban)))
		$err_ibank = true;


  	$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
	
	try{
		$query = $bdd->query('SELECT COUNT(*) FROM kunde WHERE Username = \''.$username.'\' or Email = \''.$email.'\'');

		$count = $query->fetch();
		if($count[0] != 0)
			$err_user_exist = true;

		if($err_name OR $err_vorname OR $err_strasse OR $err_plz OR $err_stadt OR $err_email OR $err_username OR $err_pwd OR $err_repwd
				OR $err_ibank OR $err_user_exist)
			header('Location: ../view/registrieren.php?err_name='.$err_name.'&err_vorname='.$err_vorname.'&err_strasse='.$err_strasse.'&err_plz='
			.$err_plz.'&err_stadt='.$err_stadt.'&err_email='.$err_email.'&err_username='.$err_username.'&err_pwd='.$err_pwd.'&err_repwd='
			.$err_repwd.'&err_IBAN='.$err_ibank.'&err_user_exist='.$err_user_exist);
		else{
			$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
			$req = $bdd->prepare('INSERT INTO kunde (Namekunde, Vorname, Strasse, PLZ, Stadt, Email, Username, Password, IBANkunde) VALUES(:Namekunde, :Vorname,:Strasse, :PLZ, :Stadt, :Email, :Username, :Password, :IBANkunde)');
			$req->execute(array('Namekunde'=>$name,'Vorname'=>$vorname,'Strasse'=>$strasse,'PLZ'=>(int)$plz,'Stadt'=>$stadt,'Email'=>$email,'Username'=>$username,'Password'=>sha1($pwd),'IBANkunde'=>$ibank));
			header('Location: ../view/start_seite.php?user_create=1');
		}
	}catch(Exception $e){
		die('Fehler:' .$e->getMessage());
	}
?>