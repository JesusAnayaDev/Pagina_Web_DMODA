<?php include('template/cabecera.php'); ?>

<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtMarca=(isset($_POST['txtMarca']))?$_POST['txtMarca']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include('config/bd.php');

switch($accion){

        case "Agregar";
            $sentenciaSQL= $conexion->prepare("INSERT INTO ropa (marca, imagen) VALUES (:marca, :imagen);");
            $sentenciaSQL->bindParam(':marca',$txtMarca);

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            if ($tmpImagen!="") {
                move_uploaded_file($tmpImagen,"../img/".$nombreArchivo);
            }

            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->execute();

            header("Location:productos.php");
        break;

        case "Modificar";

            $sentenciaSQL=$conexion->prepare("UPDATE ropa SET marca=:marca WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->bindParam(':marca',$txtMarca);
            $sentenciaSQL->execute();

            if ($txtImagen!="") {

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
                move_uploaded_file($tmpImagen,"../img/".$nombreArchivo);

                $sentenciaSQL=$conexion->prepare("SELECT imagen FROM ropa WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $ropa=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                if (isset($ropa["imagen"]) && ($ropa["imagen"]!="imagen.jpg")) {
                    if (file_exists("../img/".$ropa["imagen"])) {
                        unlink("../img/".$ropa["imagen"]);
                    }
                }

                $sentenciaSQL=$conexion->prepare("UPDATE ropa SET imagen=:imagen WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->execute();
            }

            header("Location:productos.php");

        break;


        case "Cancelar";
            header("Location:productos.php");
        break;

        case "Seleccionar";
            $sentenciaSQL=$conexion->prepare("SELECT * FROM ropa WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $ropa=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $txtMarca=$ropa['marca'];
            $txtImagen=$ropa['imagen'];
            
        break;

        case "Borrar";

            $sentenciaSQL=$conexion->prepare("SELECT imagen FROM ropa WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $ropa=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($ropa["imagen"]) && ($ropa["imagen"]!="imagen.jpg")) {
                if (file_exists("../img/".$ropa["imagen"])) {
                    unlink("../img/".$ropa["imagen"]);
                }
            }
            
            
            $sentenciaSQL=$conexion->prepare("DELETE FROM ropa WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            
            header("Location:productos.php");
        break;  

}


$sentenciaSQL=$conexion->prepare("SELECT * FROM ropa");
$sentenciaSQL->execute();
$listaropa=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



?>

<div class="col-md-5">

<div class="card">
    <div class="card-header">
        Datos  De Ropa
    </div>

    <div class="card-body">
    <form method="POST" enctype="multipart/form-data">
    <div class = "form-group">
    <label for="txtID">ID:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID"  placeholder="ID">
    </div>

    <div class = "form-group">
    <label for="txtMarca">Nombre:</label>
    <input type="text" required class="form-control" value="<?php echo $txtMarca; ?>" name="txtMarca" id="txtMarca"  placeholder="Marca de la ropa">
    </div>

    <div class = "form-group">
    <label for="txtImagen">Imagen:</label>

    <br/>

    <?php if ($txtImagen!="") { ?>
            
        <img class="img-thumbnail rounded" src="../img/<?php echo $txtImagen;?>" width="50" alt="">
        
    <?php } ?>

    <input type="file" class="form-control"  name="txtImagen" id="txtImagen"  placeholder="ID">
    </div>

    <div class="btn-group" role="group" aria-label="">
        <button type="submiy" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-danger">Cancelar</button>
    </div>
    
    </form>
    </div>

</div>


    
    
</div>

<div class="col-md-7">
    
    <table class="table table-bordered formulario">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaropa as $ropa) {?>
            <tr>
                <td><?php echo $ropa['id']?></td>
                <td><?php echo $ropa['marca']?></td>

                <td>
                    
                <img class="img-thumbnail rounded" src="../img/<?php echo $ropa['imagen']?>" width="50" alt="">
                
            
            
            </td>

                <td>

                <form method="post">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $ropa['id'] ?>"/>
                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-info">
                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger">

                </form>
            
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>


</div>

<?php include('template/pie.php'); ?>

