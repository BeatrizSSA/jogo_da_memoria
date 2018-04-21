<?php 
	
	session_start();
	
	unset( $_SESSION["estado"], $_SESSION["cartas"], $_SESSION['contadorP'], $_SESSION['contadorN']);

	header("location: jogar.php");

?>