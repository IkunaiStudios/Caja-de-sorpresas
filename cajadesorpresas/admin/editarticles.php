<?php 
	include (__DIR__ . '/../recursos/conexion.php');
	include (__DIR__ . '/../recursos/consultas.php');

	session_start();

	$enviado = false;

	$idArticle = $_GET['id'];

	if(isset($_POST['title'], $_POST['body'], $_POST['date'], $_POST['author'])){
        $title = $_POST['title'];
        $body = $_POST['body'];
        $date = $_POST['date'];
        $author = $_POST['author'];
        //insertar imagen
        $img = $_FILES['img']['name'];
    	$path = $_FILES['img']['tmp_name'];
    	$fate = "../img/".$img;
    	$realfate = "img/".$img;
    	copy($path, $fate);

        EditArticle($enlace, $idArticle, $title, $body, $date, $author, $realfate);
        $enviado = true;
    }
    
    $article = GetArticle($enlace, $idArticle);

    


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
			EDITAR ARTICULO
		</h1>
		<?php 
			if($enviado):?>
				<div class="alert alert-success" role="alert">
  					<a href="panel.php" class="alert-link"><strong>¡Enhorabuena!</strong> El articulo ha sido modificado satisfactoriamente.</a>
				</div>
		<?php
			endif;
		 ?>		
		<br>
		<div class="row">
			<div class="col s12 m4 l2"><p></p></div>				
			<form method="post" class="col s12 m4 l8" enctype="multipart/form-data">
        		<div class="input-field">
				<?php foreach ($article as $row):?>
					<i class="material-icons prefix">loyalty</i>						
					<input type="text" name="title" value="<?php echo $row['name'] ?>" class="validate" required>
					<label for="titulo">Titulo del libro:</label>
					<br>
				</div>
				<div>
					<label for="textarea1">Cuerpo del post</label>
          			<textarea name="body" id="editor" cols="30" rows="15"><?php echo $row['body'] ?></textarea>
					<br>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">today</i>
					<input type="date" name="date" value="<?php echo $row['date'] ?>" class="validate" required>
					<br>	
				</div>
				<div class="file-field input-field">
      				<div class="waves-effect waves-light btn blue">
        				<span><i class="material-icons">cloud_upload</i> Subir imagen</span>
        				<input type="file" name="img" required>
      				</div>
      				<div class="file-path-wrapper">
        				<input class="file-path validate" type="text" value="<?php echo $row['img'] ?>"required>
      				</div>
      				<br>
    			</div>
				<div class="input-field">
					<i class="material-icons prefix">person_pin</i>						
					<input type="text" name="author" value="<?php echo $row['author'] ?>" class="validate">
					<label for="autor">Autor</label>
				</div>
				<br><br>
				<div class="row">
					<div class="col s12 offset-s8">
						<button class="btn waves-effect waves-light" type="submit" name="action">TERMINAR EDICCIÓN
    						<i class="material-icons right">edit</i>
  						</button>
  					</div>
  				</div>
				<?php endforeach ?>				
			</form>
			<div class="col s12 m4 l2"><p></p></div>
		</div>
			
			<br><br>
			<div>
				<a href="panel.php" class="btn btn-success"><i class="material-icons right">arrow_back</i>VOLVER A PANEL</a>
			</div>
		</div>
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