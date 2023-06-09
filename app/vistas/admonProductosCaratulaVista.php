<?php include_once("encabezado.php"); ?>
<h1 class="text-center">Lista de Productos</h1>
<div class="card p-4 bg-light">
    <h1> Usuarios administrativos</h1>
    <table class="table table-striped" width="100%">
        <thead>
            <th>id</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Modificar</th>
            <th>Borrar</th>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($datos['data']); $i++) {
                $tipo = $datos["data"][$i]["tipo"] - 1;
                print "<tr>";
                print "<td>" . $datos["data"][$i]["id"] . "</td>";
                print "<td class='text-left'>" . $datos["tipoProducto"][$tipo]['cadena'] . "</td>";
                print "<td class='text-left'>" . $datos["data"][$i]["nombre"] . "</td>";
                print "<td class='text-left'>" . html_entity_decode($datos["data"][$i]["descripcion"]) . "</td>";
                //
                print "<td><a href='" . RUTA . "admonProductos/cambio/" . $datos["data"][$i]["id"] . "' class='btn btn-info'>Modificar</a></td>";
                //
                print "<td><a href='" . RUTA . "admonProductos/baja/" . $datos["data"][$i]["id"] . "' class='btn btn-danger'>Borrar</a></td>";
                print "</tr>";
            }
            ?>
        </tbody>
    </table>
</div><!--card-->
<a href="<?php print RUTA; ?>admonProductos/alta" class="btn btn-success">Dar de alta un producto</a>

<?php include_once("piepagina.php"); ?>