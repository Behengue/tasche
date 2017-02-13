<?php
	session_start();
	include 'functions.php';
 
	$entf = $_GET['idt'];
	warenEntfernen($entf);
	//var_dump($_SESSION["waren"]);
	header('Location: ../view/warenkorb.php');
?>		