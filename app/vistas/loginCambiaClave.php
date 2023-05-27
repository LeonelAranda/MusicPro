<?php include_once("encabezado.php"); ?>

<h1 class="text-center">Cambia tu contraseña</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>login/cambiaclave" method="POST">

        <div class="form-group text-left">
            <label for="clave1">Nueva contraseña:</label>
            <input type="password" name="clave1" class="form-control">
        </div>

        <div class="form-group text-left">
            <label for="clave2">repetir contraseña:</label>
            <input type="password" name="clave2" class="form-control">
        </div>

        <div class="form-group text-left">
            <input type="hidden" name="id" value="<?php print $datos['data']; ?>" />
            <input type="submit" value="enviar" class="btn btn-success">
            <a href="<?php print RUTA . '/login/'; ?>" class='btn btn-info'"> Regresar </a>
        </div>


    </form>
</div> <!--card-->

<?php include_once("piepagina.php"); ?>