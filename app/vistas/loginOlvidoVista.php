<?php include_once("encabezado.php"); ?>

<h1 class="text-center"><?php print $datos["subtitulo"]; ?> </h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>login/olvido" method="POST">
        <div class="form-group text-left">
            <label for="email">Correo electronico:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group text-left">
            <input type="submit" value="enviar" class="btn btn-success">
            <a href="<?php print RUTA; ?>" class="btn btn-info">Regresar</a>
        </div>

    </form>
</div> <!--card-->
<p>se te enviará un correo, favor de verificar tu bandeja de entrada o spam.</p>

<?php include_once("piepagina.php"); ?>