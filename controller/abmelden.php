<?php
	session_start();
	session_destroy();
	header('Location: ../view/start_seite.php');
?>