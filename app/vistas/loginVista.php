<?php include_once("encabezado.php"); ?>

<h1 class="text-center">Ingresar</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>login/verifica" method="POST">
        <div class="form-group text-left">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control" placeholder="Escrbe tu usuario(correo)" value="<?php
                                                                                                                    print isset($datos['data']['usuario']) ? $datos['data']['usuario'] : ''; ?>">
        </div>

        <div class="form-group text-left">
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" class="form-control" placeholder="Escribe tu contraseña" value="<?php
                                                                                                                        print isset($datos['data']['clave']) ? $datos['data']['clave'] : ''; ?>">
        </div>

        <div class="form-group text-left">
            <input type="submit" value="enviar" class="btn btn-success">
        </div>

        <input type="checkbox" name="recordar">
        <?php
        if (isset($datos['data']['recordar'])) {
            if ($datos['data']['recordar'] == "on"); {
                # code...
            }
        }
        ?>
        <label for="contraseña">Recordar</label>
        <br>

    </form>
</div> <!--card-->
<a href="<?php print RUTA; ?>login/registro">Registrate</a> <br>
<a href="<?php print RUTA; ?>login/olvido/">¿Olvidaste tu contraseña?</a>

<?php include_once("piepagina.php"); ?>