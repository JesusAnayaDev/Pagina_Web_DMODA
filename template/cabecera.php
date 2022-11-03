<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" data-dark>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D' Moda</title>


    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.2.1/hamburgers.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body data-dark>
    <header class="header" data-dark>
            <nav class="navegador">
                <a class="logo" href="index.php">D' Moda </a>
                <div class="caja-menu-mobil">
                    <ul class="enlaces" data-dark>
                        <li>
                            <a href="index.php">Inicio</a>
                        </li>
                        <li>
                            <a href="productos.php">Ropa</a>
                        </li>
                        <li>
                            <a  href="nosotros.php">Nosotros</a>
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
                <div class="centrar">
                    <input type="search" placeholder="Search..." class="card-filter" dark-btn>
                    <a href="" class="boton" dark-btn>🔍</a>
                </div>
            </nav>
    </header>


    <button dark-btn class="btn-config hamburger--emphatic" type="button">
        <span class="hamburger-box">
            <span class="alinear hamburger-inner"></span>
        </span>
    </button>

    <button dark-btn class="scroll-top-btn hidden"> &#8593; </button>

    <button dark-btn class="dark-theme-btn"> 🌙 </button>

    <div dark-btn id="reloj" class="reloj">Reloj Digital</div>