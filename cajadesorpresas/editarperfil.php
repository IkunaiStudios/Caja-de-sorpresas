<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Libronxia - Todo en libros</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php 
    //Header
    include 'template/header.php';
   ?>
   <br>
   <div class="container">
   <h2 class="grey-text">Editar mi perfil</h2>
   <br><br.
     <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" type="text" class="validate">
          <label for="first_name">Su nombre</label>
        </div>        
      </div>      
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <div class="file-field input-field">
            <div class="btn">
              <span>Subir Avatar</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <div class="row"> 
        <div class="col s8 offset-s9">                                
          <button class="btn blue" type="submit" name="action">CONFIRMAR EDICIÓN</button>
        </div>
      </div>
    </form>
  </div>
   </div>   

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script type="text/javascript">
     $(document).ready(function(){
      $('.slider').slider();
      $('.carousel').carousel();
      $( "#verlibrosbtt" ).click(function() {          
          $('html, body').animate({scrollTop: $("#CollectionBook").offset().top - document.body.clientHeight + $("#CollectionBook").height() }, 1000);
        });
        $('.dropdown-button').dropdown({
        inDuration: 600,
        outDuration: 300,
        constrain_width: true, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: true, // Displays dropdown below the button
        alignment: 'right' // Displays dropdown with edge aligned to the left of button
        });
      });     
  </script>
  </body>
</html>