<?php 
  include('recursos/conexion.php');
  include 'recursos/consultas.php';
  //trabajar aqui
  $currentArticles = GetArticleRandom($enlace);

  $article = GetArticle($enlace, $_GET['post']);
  foreach ($article as $arti) {
    $data = array('name' => $arti['name'],
                  'body' => $arti['body'],
                  'date' => $arti['author'],);
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
    //Header
    include 'template/header.php';
   ?> 
   <br>
    <nav>
      <div class="nav-wrapper light-blue accent-3">
        <div class="container">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Inicio</a>
            <a href="" class="breadcrumb">Post</a>        
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col s8">
          <div  id="artitulo" class="croisant" align="left">
          <h3><?php echo $data['name']; ?></h3>
        </div>                  
        <hr>
        <div class="flow-text" align="justify">
          <?php echo $data['body']; ?>    
        </div>
        </div>

        <div class="col s3">
          <ul class="row">
          <h5>Te lo recomendamos:</h5>
        <?php 
        $html = '
        <li data-url-follow="#" class="col s12">          
          <a href="articles.php?id=%d">
            <img src="%s"  class="responsive-img" style="border-radius:15px">
             <p class="center" align="justify">%s</p>
          </a>      
        </li>';
        foreach ($currentArticles as $row){          
          printf($html, $row['id'], $row['img'],LimitChar($row['author'], 8), LimitChar($row['name'], 30));
        }
        ?>                 
        </ul>
        </div>
      </div>
    </div>
    <?php 
    //Header
    include 'template/footer.php';
   ?> 
  </body>
</html>