<?php include('template/cabecera.php'); ?>
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-3">Bienvenido <?php echo $user['user'] ?></h1>
                    <p class="lead">Compra tu ropa al mejor precio</p>
                    <hr class="my-2">
                    <p>Mas Informacion</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="productos.php" role="button">Administrar Inventario</a>
                </p>
                </div>
            </div>
            
<?php include('template/pie.php'); ?>