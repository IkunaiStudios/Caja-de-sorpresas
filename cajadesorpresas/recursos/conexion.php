<?php
  $servidor = "localhost:3306";
  $base_datos = "cajadesorpresas";
  $usuario = "root";
  $clave = "";
  $dns = "mysql:dbname=$base_datos;host=$servidor";
  
  $enlace = new PDO($dns, $usuario, $clave);

  /*$servidor = "localhost:3306";
  $base_datos = "db_libreria";
  $usuario = "root";
  $clave = "";
  $dns = "mysql:dbname=$base_datos;host=$servidor";*/
  ?>