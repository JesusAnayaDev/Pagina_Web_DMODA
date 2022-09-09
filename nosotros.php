<?php include("template/cabecera.php"); ?>
<div class="jumbotron">
    <h1 class="display-3">Nosotros</h1>
    <p class="lead">Hola Somos D' Moda</p>
    <hr class="my-2">
</div>

<div class="col-md-4 tamaño"> 
    <div class="card-header bg-success text-white">
        Ingrese sus datos
    </div>

    <form method="POST" >
    <div class="card-body">
        <input type="text" placeholder="name" name="name" required="">
    </div>
        
    <div class="card-body"> 
    <input type="email" placeholder="email" name="email" required="">
    </div>
        
    <div class="card-body">
        <input type="text" placeholder="asunto" name="asunto" required="">
    </div>    
        
    <div class="card-body">
        <textarea placeholder="mesnaje" name="msg"></textarea>
    </div>
    <style>

        form{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #ededed;
        }

        textarea{

            max-height: 400px;
            width: 300px;
            border: none;
            min-height: 100px;
        }

        input{
            width: 300px;
            border: none;
        }

        .tamaño{
            min-width: 400px;
        }


    </style>
    <div class="card-body">
        <input type="submit" class="btn btn-success" name="enviar">
    </div>

    </form>

</div>
<?php include("correo.php"); ?>
<?php include("template/pie.php"); ?>

