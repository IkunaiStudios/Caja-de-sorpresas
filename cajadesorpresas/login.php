<?php 
	include ('recursos/conexion.php');
	include ('recursos/consultas.php');

	session_start();

	if(isset($_SESSION['user'])){
		echo '<script> window.location="admin/panel.php"; </script>';
	}

?>
<!DOCTYPE html>
<html lang="en">
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
    //Header
    include 'template/header.php';
   ?> 
   <br>
    <nav>
      <div class="nav-wrapper light-blue accent-3">
        <div class="container">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Inicio</a>
            <a href="" class="breadcrumb">Login Administrador</a>        
          </div>
        </div>
      </div>
    </nav>
    <br>
	<div class="container">
    	<div class="row">
    		<div class="col s12 m4 l3"><p></p></div>
    		<form class="col s12 m4 l6" method="post" action="admin/validar.php">
    		  <div class="row">
    		    <div class="input-field col s12">
    		      <input id="email" name="email" type="email" class="validate" required>
    		      <label for="email">Email</label>
    		    </div>
    		  </div>
    		  <div class="row">
    		    <div class="input-field col s12">
    		      <input id="password" name="password" type="password" class="validate" required>
    		      <label for="password">Password</label>
    		    </div>
    		  </div>
    		   <button class="btn waves-effect waves-light" type="submit" name="action">ACCEDER
    			<i class="material-icons right">send</i>
  				</button>
    		</form>
    		<div class="col s12 m4 l3"><p></p></div>
  		</div>
	</div>
    <!--  Scripts-->  
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>  
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    });  
  </script>
  </body>
</html>
