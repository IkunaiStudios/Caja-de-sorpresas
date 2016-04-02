<?php 
	include (__DIR__ . '/../recursos/conexion.php');
	include (__DIR__ . '/../recursos/consultas.php');

	session_start();
	$deleter = $_GET['id'];
	
	
	DeleteArticle($enlace, $deleter);
	echo '<script> window.location="panel.php?article=deleted"; </script>';
	
 ?>
