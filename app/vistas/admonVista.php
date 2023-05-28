<?php include_once("encabezado.php"); ?>

<h1 class="text-center">Modulo administrativo</h1>
<div class="card p-4 bg-light">
    <form action="<?php print RUTA; ?>admon/verifica" method="POST">
        <div class="form-group text-left">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" class="form-control" placeholder="Escrbe tu usuario(correo)" value="<?php
                                                                                                                    print isset($datos['data']['usuario']) ? $datos['data']['usuario'] : ''; ?>">
        </div>

        <div class="form-group text-left">
            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" class="form-control" placeholder="Escribe tu contraseña" value="<?php
                                                                                                                print isset($datos['data']['clave']) ? $datos['data']['clave'] : ''; ?>">
        </div>

        <div class="form-group text-left">
            <input type="submit" value="enviar" class="btn btn-success">
        </div>



    </form>
</div> <!--card-->


<?php include_once("piepagina.php"); ?>