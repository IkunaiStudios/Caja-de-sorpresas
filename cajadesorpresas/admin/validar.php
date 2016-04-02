<?php 
	include (__DIR__ . '/../recursos/conexion.php');
	include (__DIR__ . '/../recursos/consultas.php');
	
	session_start();
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
  </head>
<body>
	<?php 
		include (__DIR__ . '/../template/header_admin.php');
	?>
   <br>
	<?php
		if(isset($_POST['email'],$_POST['password'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
		}else{
			$email = "";
			$password = "";
		}

		$datos = Login($enlace, $email, $password);

		if($datos != FALSE){
			foreach ($datos as $row) {
				$_SESSION['user'] = $row['name'];
				$_SESSION['admin'] = $row['administrator'];
			}
			echo '<script> window.location="panel.php"; </script>';
		}
		else{ ?>
			<br>
	<div class="container">
    	<div class="row">
    		<div class="col s12 m4 l3"><p></p></div>
    		<form class="col s12 m4 l6" method="post">
    		  <div class="row">
    		    <div class="input-field col s12">
    		      <input id="email" placeholder="Su Email" name="email" type="email" class="validate" required>
    		    </div>
    		  </div>
    		  <div class="row">
    		    <div class="input-field col s12">
    		      <input id="password" name="password" placeholder="Su Contraseña" type="password" class="validate" required>
    		    </div>
    		  </div>
    		   <button class="btn waves-effect waves-light" type="submit" name="action">ACCEDER
    			<i class="material-icons right">send</i>
  				</button>
    		</form>
    		<div class="col s12 m4 l3"><p></p></div>
  		</div>
	</div>
		<?php  
			echo '<script> alert("Usuario y/o Contraseña Incorrectos"); </script>';
		}
		?>
	</body>
</html>