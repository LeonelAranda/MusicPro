<?php include_once("encabezado.php"); ?>

<h1 class="text-center">Ingresar</h1>
<div class="card p-4 bg-light">
    <form action="login/verifica/" method="POST">
        <div class="form-group text-left">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control">
        </div>

        <div class="form-group text-left">
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" class="form-control">
        </div>

        <div class="form-group text-left">
            <input type="submit" value="enviar" class="btn btn-success">
        </div>

        <input type="checkbox" name="recordar">
        <label for="contraseña">Recordar</label>
        <br>

    </form>
</div> <!--card-->
<a href="login/alta/">Registrate</a> <br>
<a href="login/olvido/">¿Olvidaste tu contraseña?</a>

<?php include_once("piepagina.php"); ?>