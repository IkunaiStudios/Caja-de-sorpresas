<?php 
  include('recursos/conexion.php');
  include 'recursos/consultas.php';

  session_start();
  if(isset($_SESSION['user'])){
    $logeado = true;
    $username = $_SESSION['user'];
  }


  if(!empty($_GET['page'])){
    $page = $_GET['page'];
  }
  else {
    $page = "1";
  }
  
  $somePage = 6;

  if($page == "" || $page == "1"){
    $Actualpage = 0;
  }
  else{
    $Actualpage = ($page * $somePage) - $somePage;
  }

  $articles = GetPagArticles($enlace, $Actualpage, $somePage);
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
  <div id="ImagenPost" class="row-fluid" style="background-image: url('img/imagen_5.jpg'); min-height: 65vh; background-size: cover;">
    <div id="content">
      <div class="container text-left">.
        <br> <br> <br><br> <br> <br><br> <br> <br><br>
        <div class="col-sm-6"><h1 class="center" style="color:yellow;text-shadow: 2px 2px #000000;">¿Quieres Divertirte y pasar buen rato? <span style="color:#fff">¡Pues date un vuelta!</span></h1></div>             
      </div>          
    </div>                
  </div>     
  <div class="container" id="CollectionBook">       
    <div class="section">
    <!--   Icon Section   -->
      <h5>Ultimos Post:</h5>
        <ul class="row">
        <?php 
        //contando los articulos
        $fetched = $articles->fetchAll();
        if(count($fetched)  == 0){
          echo '<h2>¡Error! No hay post en el servidor.</h2>';
          echo '<img src="img/yonofui.jpg" alt="yonofui">';
        }

        $html = ' <li data-url-follow="#" class="col l4 m6 s10">          
            <div class="card">
              <a href="articles.php?post=%d">
                <div class="card-image">
                  <img src="%s" alt="%s">
                </div>
                <div class="card-content">
                  <h6>%s</h6>
                </div>
              </a>
              <div class="card-action row">
                <span class="col s8"><i class="material-icons">date_range </i> %s</span>
                <span class="col s4 price">By <span>%s</span></span>
              </div>
            </div>            
          </li>';
        foreach ($articles as $row){          
          printf($html, $row['id'], $row['img'], $row['name'], LimitChar($row['name'], 45), $row['date'],LimitChar($row['author'], 10));
        }

        ?>                 
        </ul>
               
      </div>
      <div class="row">
        <div class="col-md-5 col-md-offset-5">
          <ul class="pagination center">

            <?php $mipag = PaginationArticles($enlace, $somePage); 
              $pageLeft = $page - 1;
              $pageRight = $page + 1;
               $counter = 0;
               
  
              if($page == 1 || count($fetched) == 0):
                echo '<li class="disabled"><a><i class="material-icons">chevron_left</i></a></li>';
              else:
                echo '<li class="waves-effect"><a href="index.php?page='.$pageLeft.'"><i class="material-icons">chevron_left</i></a></li>';
              endif;
            
              for ($i=1; $i <= $mipag; $i++) { 
                $counter++;
                if($i == $page){
                  echo '<li class="active"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                }
                else{
                  echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>'; 
                }
              }

              if($page == $counter || count($fetched) == 0):
                echo '<li class="disabled"><a><i class="material-icons">chevron_right</i></a></li>';
              else:
                echo '<li class="waves-effect"><a href="index.php?page='.$pageRight.'"><i class="material-icons">chevron_right</i></a></li>';
              endif;
            ?>
          </ul>
        </div>
    </div>
  </div>    
  <br><br>
  <?php 
    //Header
    include 'template/footer.php';
   ?> 

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
