<?php include_once("encabezado.php"); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script src="<?php print RUTA; ?>js/admonProductosAltaVista.js"></script>
<h1 class="text-center">Alta de un producto.</h1>
<div>
    <form action="<?php print RUTA; ?>admonProductos/alta/" method="POST" enctype="multipart/form-data">
        <div class="form-group text-left">
            <label for="tipoProducto">* Tipo de producto:</label>


            <select class="form-control" name="tipo" id="tipo">
                <option value="void">Selecciona el tipo de producto</option>
                <?php
                for ($i = 0; $i < count($datos["tipoProducto"]); $i++) {
                    print "<option value='" . $datos["tipoProducto"][$i]["indice"] . "'";
                    print ">" . $datos["tipoProducto"][$i]["cadena"] . "</option>";
                }
                ?>
            </select>

            <div class="form-group text-left">
                <label for="nombre">* Nombre del producto:</label>
                <input type="text" name="nombre" class="form-control" required placeholder="Escribe el nombre del producto" value="<?php
                                                                                                                                    print isset($datos['data']['nombre']) ? $datos['data']['nombre'] : '';  ?>">
            </div>

            <div class="form-group text-left">
                <label for="marca">* Marca del producto:</label>
                <input type="text" name="marca" class="form-control" required placeholder="Escribe la marca del producto" value="<?php print isset($datos['data']['marca']) ? $datos['data']['marca'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="content">* Descripción del producto:</label>
                <textarea name="content" id="editor" cols="30" rows="10"></textarea>
            </div>


            <div class="form-group text-left">
                <label for="precio">* Precio del producto:</label>
                <input type="text" name="precio" class="form-control" pattern="^(\d|-)?(\d|,)*\.?\d*$" required placeholder="Escribe el precio(sin comas ni simbolos)" value="<?php print isset($datos['data']['precio']) ? $datos['data']['precio'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="descuento">Descuento del producto:</label>
                <input type="text" name="descuento" class="form-control" pattern="^(\d|-)?(\d|,)*\.?\d*$" placeholder="Escribe el descuento(sin comas ni simbolos)" value="<?php print isset($datos['data']['descuento']) ? $datos['data']['descuento'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="envio">Costo del envío:</label>
                <input type="text" name="envio" class="form-control" pattern="^(\d|-)?(\d|,)*\.?\d*$" placeholder="Escribe el costo del envío." value="<?php print isset($datos['data']['envio']) ? $datos['data']['envio'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="imagen">* Imagen del producto:</label>
                <input type="file" name="imagen" class="form-control" accept="image/jpeg">
            </div>

            <div class="form-group text-left">
                <label for="fecha">* Fecha del producto:</label>
                <input type="date" name="fecha" class="form-control" placeholder="Fecha de creación o control del producto (DD/MM/AAAA)." value="<?php
                                                                                                                                                    print isset($datos['data']['fecha']) ? $datos['data']['fecha'] : '';
                                                                                                                                                    ?>">
            </div>

            <div class="form-group text-left">
                <label for="status">Status del producto:</label>
                <select class="form-control" name="status" id="status">
                    <option value="void">Selecciona status producto</option>
                    <?php
                    for ($i = 0; $i < count($datos["statusProducto"]); $i++) {
                        print "<option value='" . $datos["statusProducto"][$i]["indice"] . "'";
                        print ">" . $datos["statusProducto"][$i]["cadena"] . "</option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-group text-left">
                <input type="submit" value="Enviar" class="btn btn-success">
                <a href="<?php print RUTA; ?>admonProductos" class="btn btn-info">Volver</a>
            </div>
    </form>
</div> <!--card-->
<?php include_once("piepagina.php"); ?>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>