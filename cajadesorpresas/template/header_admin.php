    <?php 
    
     ?>

    <nav class="grey">
          <div class="nav-wrapper">
            <div class="container">
              <a href="panel.php" class="brand-logo"><img class="responsive-img" width="120" src="../img/Admin.png"></a>
              <ul id="dropdown1" class="dropdown-content">
                <li><a href="#">Editar Perfil</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $_SESSION['user']; ?><i class="material-icons right">account_circle</i></a></li>
                <?php 
                if($_SESSION['admin'] == 1){
                  echo '<li><a href="../admin/createuser.php">Crear nuevo usuario</a></li>';
                }
              ?>
              </ul>
            </div>
          </div> 
      </nav>  
      <br>             
   