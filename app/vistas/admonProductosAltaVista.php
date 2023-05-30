<?php include_once("encabezado.php"); ?>
<h1 class="text-center">Alta de un producto.</h1>
<div>
    <form action="<?php print RUTA; ?>admonProductos/alta/" method="POST">
        <div class="form-group text-left">
            <label for="usuarios">* Tipo de producto:</label>
            <select class="form-control" name="tipo" id="tipo">
                <option value="void">Seleccione tipo de producto
                <option value="1">Instrumento de cuerda</option>
                <option value="2">Percusión</option>
                <option value="3">Amplificadores</option>
                <option value="4">Cajas</option>
                <option value="5">Accesorios varios</option>
            </select>



            <div class="form-group text-left">
                <label for="nombre">* Nombre del producto:</label>
                <input type="text" name="nombre" class="form-control" required placeholder="Escribe el nombre del producto" value="<?php
                                                                                                                                    print isset($datos['data']['nombre']) ? $datos['data']['nombre'] : '';  ?>">
            </div>

            <div class="form-group text-left">
                <label for="descripcion">* Descripción del producto:</label>
                <input type="text" name="descripcion" class="form-control" required placeholder="Escribe descripcion del producto" value="<?php print isset($datos['data']['descripcion']) ? $datos['data']['descripcion'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="marca">* Marca del producto:</label>
                <input type="text" name="marca" class="form-control" required placeholder="Escribe la marca del producto" value="<?php print isset($datos['data']['marca']) ? $datos['data']['marca'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="precio">* Precio del producto:</label>
                <input type="text" name="precio" class="form-control" required placeholder="Escribe el precio(sin comas ni simbolos)" value="<?php print isset($datos['data']['precio']) ? $datos['data']['precio'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="descuento">Descuento del producto:</label>
                <input type="text" name="descuento" class="form-control" placeholder="Escribe el descuento(sin comas ni simbolos)" value="<?php print isset($datos['data']['descuento']) ? $datos['data']['descuento'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="envio">Costo del envío:</label>
                <input type="text" name="envio" class="form-control" placeholder="Escribe el costo del envío." value="<?php print isset($datos['data']['envio']) ? $datos['data']['envio'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="imagen">* Imagen del producto:</label>
                <input type="file" name="imagen" class="form-control" accept="image/jpeg">
            </div>

            <div class="form-group text-left">
                <label for="fecha">fecha del producto:</label>
                <input type="date" name="fecha" class="form-control" required placeholder="Fecha de creación del producto." value="<?php print isset($datos['data']['fecha']) ? $datos['data']['fecha'] : ''; ?>">
            </div>

            <div class="form-group text-left">
                <label for="status">Status del producto:</label>
                <input type="date" name="status" class="form-control" required placeholder="Status del producto." value="<?php print isset($datos['data']['status']) ? $datos['data']['status'] : ''; ?>">
            </div>


            <div class="form-group text-left">
                <input type="submit" value="Enviar" class="btn btn-success">
                <a href="<?php print RUTA; ?>admonProductos" class="btn btn-info">Volver</a>
            </div>
    </form>
</div> <!--card-->
<?php include_once("piepagina.php"); ?>