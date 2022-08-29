<?php include("template/cabecera.php"); ?>

<?php include("administrador/config/bd.php");

$sentenciaSQL=$conexion->prepare("SELECT * FROM ropa");
$sentenciaSQL->execute();
$listaropa=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<?php foreach ($listaropa as $numeroDeRopa) { ?>
<div class="col-md-3">

<div class="card">

    <img class="card-img-top" src="./img/<?php echo $ropa['imagen']; ?> " alt="">

    <div class="card-body">
        
        
    </div>

</div>

</div>
    
<?php } ?>

<?php include("template/pie.php"); ?>