<?php include("template/cabecera.php"); ?>
<div class="jumbotron">
    <h1 class="display-3">Nosotros</h1>
    <p class="lead">Hola Somos D' Moda</p>
    <hr class="my-2">
</div>

<div class="fondo"> 
    <div>
        Ingrese sus datos
    </div>

    <form method="POST" class="contact-form" action="https://formsubmit.co/jesusanaya558@gmail.com" method="POST" target="_blank">
        <legend>Envianos tus comentarios</legend>
        <input type="text" name="name" placeholder="Name" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" title="Nombre sólo acepta letras y espacios en blanco" required>
        <input type="email" name="email" placeholder="Email" title="Email Incorrecto" pattern="^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$" required>
        <input type="text" name="subject" placeholder="Asunto" title="Ingresa tu asunto" required>
        <textarea name="commenst" cols="50" rows="7" placeholder="Escribe tu mensaje" data-pattern="^.{1,255}$" required title="No exceder los 255 caracteres"></textarea>
        <input type="submit">

        <div class="contact-form-loader none">
            <img src="./assets/svg-loaders/three-dots.svg" alt="Cargando" class="imgsvg">
        </div>
        <div class="contact-form-response none">
            <p>Los datos han sido enviados</p>
        </div>
    </form>

</div>
<?php include("correo.php"); ?>
<?php include("template/pie.php"); ?>

