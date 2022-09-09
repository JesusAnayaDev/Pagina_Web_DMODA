<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D' Moda</title>


    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.2.1/hamburgers.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header class="header">
            <nav class="navegador">
                <a class="logo" href="index.php">D' Moda </a>
                <div>
                    <ul class="enlaces">
                        <li>
                            <a href="index.php">Inicio</a>
                        </li>
                        <li>
                            <a href="productos.php">Ropa</a>
                        </li>
                        <li>
                            <a c href="nosotros.php">Nosotros</a>
                        </li>

                        <?php if (isset($_SESSION['user_id'])) { ?>
                            <li>
                                <a href="cerrar.php">Log Out</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="administrador/index.php">Login</a>
                            </li>
                        <?php } ?>


                        <?php if (isset($_SESSION['user_id']) && $_SESSION['rol_id'] == 1) { ?>
                            <li>
                                <a href="administrador/dashboard/examples/dashboard.php">Panel de Administracion</a>
                            <?php } ?>
                    </ul>
                </div>
            </nav>
    </header>


    <button class="btn-config hamburger hamburger--emphatic" type="button">
        <span class="hamburger-box">
            <span class="alinear hamburger-inner"></span>
        </span>
    </button>
    <div class="container">
        <br>

        <div class="row">