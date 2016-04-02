<?php 
	include (__DIR__ . '/../recursos/conexion.php');
	include (__DIR__ . '/../recursos/consultas.php');
	
	session_start();

	$mensaje = false;

	if(!empty($_GET['article'])){
    	$mensaje = true;
  	}	

	$somePage = 5;


  if(!empty($_GET['page'])){
    $page = $_GET['page'];
  }	
  else {
    $page = "1";
  }
  
  
  if($page == "" || $page == "1"){
    $Actualpage = 0;   
  }
  else{
    $Actualpage = ($page * $somePage) - $somePage;
  }
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
		if(isset($_SESSION['user'])):
	 ?>
		<?php 
			include (__DIR__ . '/../template/header_admin.php');
		 ?>
		<div class="container">
			<h1 class="center">Panel Administrador</h1>
			<?php 
			if($mensaje):?>
				<div class="alert alert-success" role="alert">
  					<a href="panel.php" class="alert-link"><strong>El POST ha sido borrado</strong></a>
				</div>
			<?php
			endif;
		 	?>
			<br>
		</div>
		<div class="container">
			<div class="row">
				<div class="col s9">				
					<table class="highlight">
						<thead>
							<tr>
								<th data-field="title" class="center">Titulo</th>
								<th data-field="date" class="center">Fecha</th>
								<th data-field="author" class="center">Autor</th>
								<th data-field="actions" class="center">Acciones</th>
							</tr>
						</thead>
						<?php 
							$articles = GetPagArticles($enlace, $Actualpage, 5);
							$html = '<tbody>	
							<tr>
								<td class="center">%s</td>
								<td class="center">%s</td>
								<td class="center">%s</td>
								<td>						
									<div class="row">
										<div class="col s3 offset-s3">
											<a href="editarticles.php?id=%s" class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
										</div>
     									<div class="col s3">
											<a href="eliminar.php?id=%s" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete_forever</i></a>
										</div>
									</div>
								</td>					
							</tr>
							</tbody>';
								
							foreach ($articles as $row) {
								printf($html, $row['name'], $row['date'], $row['author'], $row['id'], $row['id']);
							}
						 ?>
					</table>
				</div>	
				<div class="col s3" style="border-left: thick solid #ff0000;">
					<ul class="collection with-header">
        				<li class="collection-header"><h5>Opciones</h5></li>
        				<li class="collection-item"><div>Crear nuevo articulo<a href="createarticles.php" class="secondary-content"><i class="material-icons">note_add</i></a></div></li>
        				<li class="collection-item"><div>Volver a pagina principal<a href="../index.php" class="secondary-content"><i class="material-icons">arrow_back</i></a></div></li>
      				</ul>
				</div>
			</div>
		</div>
		<br>
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-5">
          <ul class="pagination center">

            <?php $mipag = PaginationArticles($enlace, $somePage); 
              $pageLeft = $page - 1;
              $pageRight = $page + 1;
               $counter = 0;
  				$fetched = $articles->fetchAll();
              if($page == 1 || count($fetched) == 0):
                echo '<li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>';
              else:
                echo '<li class="waves-effect"><a href="panel.php?page='.$pageLeft.'"><i class="material-icons">chevron_left</i></a></li>';
              endif;
            
              for ($i=1; $i <= $mipag; $i++) { 
                $counter++;
                if($i == $page){
                  echo '<li class="active"><a href="panel.php?page='.$i.'">'.$i.'</a></li>';
                }
                else{
                  echo '<li><a href="panel.php?page='.$i.'">'.$i.'</a></li>'; 
                }
              }

              if($page == $counter || count($fetched) == 0):
                echo '<li class="disabled"><a><i class="material-icons">chevron_right</i></a></li>';
              else:
                echo '<li class="waves-effect"><a href="panel.php?page='.$pageRight.'"><i class="material-icons">chevron_right</i></a></li>';
              endif;
            ?>
          </ul>
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

</body>
</html>