
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['rol']==1) {
        header('Location:dashboard/docs/documentation.php');
    }else{
        header('Location:../productos.php');
    }
}


require 'config/bd.php';

if (!empty($_POST['user']) && !empty($_POST['password'])) {
    $records = $conexion->prepare('SELECT id, user, password, rol_id FROM users WHERE user=:user');
    $records->bindParam(':user', $_POST['user']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';


    if ($results > 0) {
        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
            $_SESSION['user_id'] = $results['id'];
            $_SESSION['rol_id'] = $results['rol_id'];
            if ($results['rol_id']==1) {
                header('Location:dashboard/docs/documentation.php');
            }else{
                header('Location:../productos.php');
            }
            
        } else{
            $message = 'Clave o usuario incorrectos';
            
        }
    }else{
        $message = 'Clave o usuario incorrectos';
        
    }
    
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
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
                <br>
                <br>
                <br>
                <br>
                <br>

            <div class="formulario">
                <div class="card-header text-info salir">
                    <h3 ><span class="icon-user"></span> Iniciar Sesion</h3>
                </div>
                <div class="card-body">


                <?php if(isset($message)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo  $message ?>
                    </div>
                <?php } ?>
                    <form action="index.php" method="POST" >
                    <div>
                        <label>Usuario:</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="user" placeholder="Enter User or Email" required/>
                        <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                        </span>
                    </div>

                    <br>
                    <div>
                        <label for="exampleInputPassword1">Contraseña:</label>
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        <span class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                        </span>
                    </div>

                    <br>
                    <a href="" class="salir">¿Olvidaste tu contraseña?</a>
                    

                    <br>
                    <br>
                    <button type="submit" accion="bd.php" class="btn btn-primary boton"><span class="icon-enter"></span> Sign In</button>
                    &nbsp; &nbsp;
                    <a href="signup.php" class="salir icon-clipboard">SignUp</a>
                    </form>
                    
                    
                </div>
            </div>
                
            </div>
            
        </div>
    </div>
</body>
</html>