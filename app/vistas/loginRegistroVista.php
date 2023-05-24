<?php include_once("encabezado.php"); ?>

<h2 class="text-center">Registro</h2>
<form action="login/registro" method="POST">
    <div class="form-group text-left">
        <label for="nombre">* Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escriba su nombre" required>
    </div>

    <div class="form-group text-left">
        <label for="apellidoPaterno">* Apellido Paterno:</label>
        <input type="text" name="apellidoPaterno" id="apellidoPaterno" class="form-control" placeholder="Escriba su apellido paterno" required>
    </div>

    <div class="form-group text-left">
        <label for="apellidoMaterno">* Apellido Paterno:</label>
        <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="form-control" placeholder="Escriba su apellido materno">
    </div>

    <div class="form-group text-left">
        <label for="correo">* Correo electrónico:</label>
        <input type="email" name="correo" id="correo" class="form-control" placeholder="Escriba su correo" required>
    </div>

    <div class="form-group text-left">
        <label for="clave1">* Contraseña:</label>
        <input type="password" name="clave1" id="clave1" class="form-control" placeholder="Escriba su contraseña" required>
    </div>

    <div class="form-group text-left">
        <label for="clave2">* Repetir contraseña:</label>
        <input type="password" name="clave2" id="clave2" class="form-control" placeholder="vuelva a escribir la contraseña" required>
    </div>

    <div class="form-group text-left">
        <label for="direccion">* Dirección:</label>
        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Escriba su dirección" required>
    </div>

    <div class="form-group text-left">
        <label for="ciudad">* Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Escriba su ciudad" required>
    </div>

    <div class="form-group text-left">
        <label for="region">* Region:</label>
        <input type="text" name="region" id="region" class="form-control" placeholder="Escriba su región" required>
    </div>

    <div class="form-group text-left">
        <label for="pais">* País:</label>
        <input type="text" name="pais" id="pais" class="form-control" placeholder="Escriba su País" required>
    </div>

    <div class="form-group text-left">
        <label for="enviar"></label>
        <input type="submit" value="Enviar datos" id="pais" class="btn btn-success" role="button">
    </div>

</form>

<?php include_once("piepagina.php"); ?>