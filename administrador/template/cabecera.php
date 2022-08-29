<?php 
session_start();
require 'config/bd.php';
 if (isset($_SESSION['user_id'])) {
      $records = $conexion->prepare('SELECT id, user, password, rol_id, nombre, apellido  FROM users WHERE id = :id');
      $records->bindParam(":id", $_SESSION['user_id']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);

      $user = null;

      if (count($results) > 0) {
        $user = $results;
      }

  }


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">

  </head>
  <body>

    <?php   $url="http://".$_SERVER['HTTP_HOST']."/sitioweb" ?>
      
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/productos.php">Ropa</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>">Ver Sitio Web</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php">LogOut</a>
        </div>
    </nav>

    <div class="container">
    <br>


        <div class="row">