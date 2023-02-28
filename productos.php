<?php include("template/cabecera.php"); ?>

<?php include("administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM ropa");
$sentenciaSQL->execute();
$listaropa = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="organizacion">
        <?php foreach ($listaropa as $ropa) { ?>
                        <article class="cards">
                                <figure class="card" data-dark>
                                        <div class="image">
                                                <img src="./img/<?php echo $ropa['imagen']; ?> " alt="">
                                        </div>
                                        <hr class="barra">
                                        <div >
                                                <figcaption><?php echo $ropa['marca']; ?> </figcaption>
                                        </div>
                                        <div class="item-content">
                                                <a name="" id="" class="btn btn-primary" href="caracteristicas.php" role="button">Ver más</a>
                                        </div>
                                </figure>
                        </article>
                <?php
                $numeroDeRopa = 0;
                $numeroDeRopa = "numeroDeRopa++";       
                ?>



        <?php } ?>
</div>

<?php include("template/pie.php"); ?>