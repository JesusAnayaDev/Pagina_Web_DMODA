<?php include("template/cabecera.php"); ?>

<?php include("administrador/config/bd.php");

$sentenciaSQL=$conexion->prepare("SELECT * FROM ropa");
$sentenciaSQL->execute();
$listaropa=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<?php foreach ($listaropa as $ropa) { ?>
<div class="col-md-3">

<div class="card">

    <img class="card-img-top" src="./img/<?php echo $ropa['imagen']; ?> " alt="">

    <div class="card-body">
        <h4 class="card-title"><?php echo $ropa['marca']; ?> </h4>
        <a name="" id="" class="btn btn-primary" href="caracteristicas.php" role="button">Ver más</a>
    </div>

</div>

<?php 
$numeroDeRopa=0;
$numeroDeRopa="numeroDeRopa++"; 

?>

</div>
    
<?php } ?>






<?php include("template/pie.php"); ?>