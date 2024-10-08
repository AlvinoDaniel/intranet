<?php 
	 // session_start(); 
	if (!isset($_SESSION['sess_intra_usuario']) or $_SESSION['sess_intra_usuario'] ==''){
		header("Location: identificacion.php");
	}
?>