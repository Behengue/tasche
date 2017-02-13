<?php
	session_start();
	#session_destroy();

	$waren = array();
	if (isset($_SESSION["waren"]))
		$waren = $_SESSION["waren"];

	$subwaren = array(
					'id' => $_GET['idt'],
					'menge' => $_POST['menget']);
	array_push($waren, $subwaren);
	$_SESSION["waren"] = $waren;

	header('Location: ../view/start_seite.php');

?>		
    


		

