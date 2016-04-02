<?php 
	include (__DIR__ . '/../recursos/conexion.php');
	include (__DIR__ . '/../recursos/consultas.php');
	
	session_start();
	$enviado = false;

	$admin = 0;	

	if(isset($_POST['email'], $_POST['name'], $_POST['password'])):

		$email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $check = $_POST['admin'];
        
        if($check){
        	$admin = 1;
        }else{
        	$admin = 0;	
        }
		
		AddUsers($enlace, $email, $name, $password, $admin);
		$enviado = true;

	else:
		$email = "";
        $name = "";
        $password = "";
        $check = "";
        $admin = 0;	
	endif
 ?>

<!DOCTYPE html>
<html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Caja de Sorpresas - Todo en sorpresas</title>
  
    <!-- CSS  -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"> 
    <link rel="stylesheet" href="../css/trumbowyg.min.css">
  </head>
	<body>
	<?php 
		if(isset($_SESSION['user'])):
	 ?>

	<?php 
		include (__DIR__ . '/../template/header_admin.php');
	 ?>
		
	<div class="row">		
	<div class="container">		
		<h1 class="center">
			CREAR USUARIO
		</h1>
		<?php 
			if($enviado):?>
				<div class="alert alert-success" role="alert">
  					<a href="panel.php" class="alert-link"><strong>¡Enhorabuena!</strong> El usuario ha sido creado satisfactoriamente.</a>
				</div>
		<?php
			endif;
		 ?>		
		<br>
		<div class="row">
			<div class="col s12 m4 l2"><p></p></div>				
			<form method="post" class="col s12 m4 l8">
        		<div class="input-field">				
					<i class="material-icons prefix">contact_mail</i>						
					<input type="email" name="email" class="validate" required>
					<label for="titulo">Email</label>
					<br>
				</div>
				<div class="input-field">				
					<i class="material-icons prefix">person_pin</i>						
					<input type="text" name="name" class="validate" required>
					<label for="titulo">Nombre</label>
					<br>
				</div>
				<div class="input-field">				
					<i class="material-icons prefix">lock</i>						
					<input type="password" name="password" class="validate" required>
					<label for="titulo">Contraseña</label>
					<br>
				</div>
				<div class="input-field">
					<p>
      					<input type="checkbox" name="admin" id="test5" />
      					<label for="test5">Administrador</label>
   					</p>
				</div>
				<br><br>
				<div class="row">
					<div class="col s12 offset-s8">
						<button class="btn waves-effect waves-light" type="submit" name="action">CREAR USUARIO
    						<i class="material-icons right">add</i>
  						</button>
  					</div>
  				</div>		
			</form>
			<div class="col s12 m4 l2"><p></p></div>
			<a href="panel.php" class="btn btn-success"><i class="material-icons right">arrow_back</i>VOLVER A PANEL</a>
		</div>

<?php else:
	echo '<script> window.location="index.php"; </script>';
	endif;
 ?>

 <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>  
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="../js/trumbowyg.min.js"></script>
	<!--trumbowyg js cdn -->
 <script>
 	$(document).ready(function(){
    $('#editor').trumbowyg();
	
   }); 
	
 </script>

</body>
</html>