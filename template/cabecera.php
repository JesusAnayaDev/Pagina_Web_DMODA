<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D' Moda</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
</head>
<body>

        <nav class="navbar navbar-expand - lg navbar-dark bg-primary">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">D' Moda </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php">Ropa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
                
                
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="nav-item">
                    <a class="nav-link" href="cerrar.php">Log Out</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                    <a class="nav-link" href="administrador/index.php">Login</a>
                    </li>
                <?php } ?>


                <?php if (isset($_SESSION['user_id']) && $_SESSION['rol_id']==1) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="administrador/dashboard/examples/dashboard.php">Panel de Administracion</a>
                    <?php } ?>
            </ul>
        </nav>

        
        <div class="container">
            <br>

            <div class="row">