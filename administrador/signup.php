<?php 
    require 'config/bd.php';
    $message = '';

    if (!empty($_POST['user']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (user, password, rol_id, nombre, apellido, rol) VALUES (:user, :password, 2, :nombre, :apellido, 'Cliente')";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':user',$_POST['user']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':apellido',$_POST['apellido']);

        if ($stmt->execute()) {
            $message = 'Usuario Creado Correctamente';
        } else {
            $message = 'Perdon, No pudimos crear su cuenta, verifique nuevamente';
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../icomoon/fonts/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body class="fondos_login">

    <div class="container">
        <div class="row">

        <div class="col-md-4">
            
        </div>
            <div class="col-md-4">
                <br>
                <br>
                <br>

            <div class="card formulario">
                <div class="card-header salir">
                    <h3><span class="icon-user"></span> SignUp or <a href="index.php" class="text-info">Login</a></h3>
                </div>
                <div class="card-body">


                <?php if(!empty($message)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo  $message ?>
                    </div>
                <?php } ?>
                    <form action="signup.php" method="POST">

                    <div>
                        <label>Usuario:</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="user" placeholder="Enter User or Email" required/>
                        <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                        </span>
                    </div>


                    <div>
                        <label for="exampleInputPassword1">Contraseña:</label>
                    </div>
                    
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                        </span>
                    </div>

                    <div>
                    <label for="exampleInputPassword2">Confirmar Contraseña:</label>
                    </div>
                    <div class="input-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"/>
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                        </span>
                    </div>

                    <div class="input-group">
                    <label for="exampleInputPassword2">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Name" >
                    </div>

                    <div class="form-group">
                    <label for="exampleInputPassword2">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" placeholder="Last Name" >
                    </div>

                    <button type="submit" accion="bd.php" class="btn btn-primary boton icon-clipboard" >SignUp</button>
                    </form>
                    
                    
                </div>
            </div>
                
            </div>
            
        </div>
    </div>



</body>
</html>