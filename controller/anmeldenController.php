<?php
$bdd = new PDO('mysql:host=localhost;dbname=taschen', 'root', '');
$err_username = false;
$err_pwd = false;
$err_pwd_not_match = false;
$err_user_not_exist = false;

$username = htmlspecialchars($_POST['username']);
$pwd = htmlspecialchars($_POST['pwd']);

if(!(isset($username) AND preg_match("#^([a-zA-Z]{1,1}([a-zA-Z\-\.\_]){2,100})$#", $username)))
	$err_username = true;
	
if(!(isset($pwd) AND preg_match("#^(.{8,20})$#", $pwd)))
	$err_pwd = true;

try{
	$query = $bdd->query('SELECT COUNT(*) FROM kunde WHERE Username = \''.$username.'\'');

	$count = $query->fetch();
	if($count[0] == 0)
		$err_user_not_exist = true;

	if($err_user_not_exist OR $err_pwd OR $err_username)
		header('Location: ../view/anmelden.php?err_username='.$err_username.'&err_pwd='.$err_pwd.'&err_user_not_exist='.$err_user_not_exist);
	else{
		$query = $bdd->query('SELECT COUNT(*) FROM kunde WHERE Username = \''.$username.'\' AND Password = \''.sha1($pwd).'\'');
		$count = $query->fetch();
		if($count[0] == 0){
			$err_pwd_not_match = true;
			header('Location:../view/anmelden.php?err_pwd_not_match='.$err_pwd_not_match);
		}else{
			$query = $bdd->query('SELECT * FROM kunde WHERE Username = \''.$username.'\' AND Password = \''.sha1($pwd).'\'');
			$donnee = $query->fetch();
			$id = $donnee['IDKunde'];
			header('Location: ../controller/anmeldenSessionStart.php?id='.$id);
		}
	}
}catch(Exception $e){
	die('Fehler:' .$e->getMessage());
}
?>	