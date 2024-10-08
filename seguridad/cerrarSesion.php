<?php 
	session_start();
	$_SESSION['sess_intra_usuario']  = '';
	$_SESSION['sess_intra_nombre']  = '';
	session_unset();
	session_destroy();
	header("Location: ../identificacion.php");
?>