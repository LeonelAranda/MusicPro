<?php include_once("encabezado.php"); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script src="<?php print RUTA; ?>js/admonProductosAltaVista.js"></script>
<h1 class="text-center">
    <?php

    if (isset($datos["subtitulo"])) {
        print $datos["subtitulo"];
    }
    ?>


</h1>
<div>
    <form action="<?php print RUTA; ?>admonProductos/alta/" method="POST" enctype="multipart/form-data">
        <div class="form-group text-left">
            <label for="tipoProducto">* Tipo de producto:</label>


            <select class="form-control" name="tipo" id="tipo" <?php
                                                                if (isset($datos["baja"])) {
                                                                    print " disabled ";
                                                                }

                                                                ?>>
                <option value="void">Selecciona el tipo de producto</option>
                <?php
                for ($i = 0; $i < count($datos["tipoProducto"]); $i++) {
                    print "<option value='" . $datos["tipoProducto"][$i]["indice"] . "'";
                    if (isset($datos["data"]["tipo"])) {
                        if ($datos["data"]["tipo"] == $datos["tipoProducto"][$i]["indice"]) {
                            print " selected ";
                        }
                    }
                    print ">" . $datos["tipoProducto"][$i]["cadena"] . "</option>";
                }
                ?>
            </select>

            <div class="form-group text-left">
                <label for="nombre">* Nombre del producto:</label>
                <input type="text" name="nombre" class="form-control" required placeholder="Escribe el nombre del producto" value="<?php
                                                                                                                                    print isset($datos['data']['nombre']) ? $datos['data']['nombre'] : '';  ?>" <?php
                                                                                                                                                                                                                if (isset($datos["baja"])) {
                                                                                                                                                                                                                    print " disabled ";
                                                                                                                                                                                                                }

                                                                                                                                                                                                                ?>>

            </div>

            <div class="form-group text-left">
                <label for="marca">* Marca del producto:</label>
                <input type="text" name="marca" class="form-control" required placeholder="Escribe la marca del producto" value="<?php print isset($datos['data']['marca']) ? $datos['data']['marca'] : ''; ?>" <?php
                                                                                                                                                                                                                if (isset($datos["baja"])) {
                                                                                                                                                                                                                    print " disabled ";
                                                                                                                                                                                                                }

                                                                                                                                                                                                                ?>>
            </div>

            <div class="form-group text-left">
                <label for="content">* Descripción del producto:</label>
                <textarea name="content" id="editor" cols="30" rows="10" <?php
                                                                            if (isset($datos["baja"])) {
                                                                                print " disabled ";
                                                                            }

                                                                            ?>>
                <?php
                if (isset($datos['data']['descripcion'])) {
                    print  $datos['data']['descripcion'];
                }
                ?>
                </textarea>
            </div>

            <div class="form-group text-left">
                <label for="precio">* Precio del producto:</label>
                <input type="text" name="precio" class="form-control" pattern="^(\d|-)?(\d|,)*\.?\d*$" required placeholder="Escribe el precio(sin comas ni simbolos)" value="<?php print isset($datos['data']['precio']) ? $datos['data']['precio'] : ''; ?>" <?php
                                                                                                                                                                                                                                                                if (isset($datos["baja"])) {
                                                                                                                                                                                                                                                                    print " disabled ";
                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                ?>>
            </div>

            <div class="form-group text-left">
                <label for="descuento">Descuento del producto:</label>
                <input type="text" name="descuento" class="form-control" pattern="^(\d|-)?(\d|,)*\.?\d*$" placeholder="Escribe el descuento(sin comas ni simbolos)" value="<?php print isset($datos['data']['descuento']) ? $datos['data']['descuento'] : ''; ?>" <?php
                                                                                                                                                                                                                                                                    if (isset($datos["baja"])) {
                                                                                                                                                                                                                                                                        print " disabled ";
                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                    ?>>
            </div>

            <div class="form-group text-left">
                <label for="envio">Costo del envío:</label>
                <input type="text" name="envio" class="form-control" pattern="^(\d|-)?(\d|,)*\.?\d*$" placeholder="Escribe el costo del envío." value="<?php print isset($datos['data']['envio']) ? $datos['data']['envio'] : ''; ?>" <?php
                                                                                                                                                                                                                                        if (isset($datos["baja"])) {
                                                                                                                                                                                                                                            print " disabled ";
                                                                                                                                                                                                                                        }

                                                                                                                                                                                                                                        ?>>
            </div>

            <div class="form-group text-left">
                <label for="imagen">* Imagen del producto:</label>
                <input type="file" name="imagen" class="form-control" accept="image/jpeg" <?php
                                                                                            if (isset($datos["baja"])) {
                                                                                                print " disabled ";
                                                                                            }

                                                                                            ?>>
                <?php
                if (isset($datos['data']['imagen'])) {
                    print "<p>" . $datos['data']['imagen'] . "</p>";
                }
                ?>
            </div>

            <div class="form-group text-left">
                <label for="fecha">* Fecha del producto:</label>
                <input type="date" name="fecha" class="form-control" placeholder="Fecha de creación o control del producto (DD/MM/AAAA)." value="<?php
                                                                                                                                                    print isset($datos['data']['fecha']) ? $datos['data']['fecha'] : '';
                                                                                                                                                    ?>" <?php
                                                                                                                                                        if (isset($datos["baja"])) {
                                                                                                                                                            print " disabled ";
                                                                                                                                                        }

                                                                                                                                                        ?>>
            </div>

            <div class="form-group text-left">
                <label for="status">Status del producto:</label>
                <select class="form-control" name="status" id="status" <?php
                                                                        if (isset($datos["baja"])) {
                                                                            print " disabled ";
                                                                        }

                                                                        ?>>
                    <option value="void">Selecciona status producto</option>
                    <?php
                    for ($i = 0; $i < count($datos["statusProducto"]); $i++) {
                        print "<option value='" . $datos["statusProducto"][$i]["indice"] . "'";
                        if (isset($datos["data"]["status"])) {
                            if ($datos["data"]["status"] == $datos["statusProducto"][$i]["indice"]) {
                                print " selected ";
                            }
                        }
                        print ">" . $datos["statusProducto"][$i]["cadena"] . "</option>";
                    }
                    ?>
                </select>
            </div>



            <div class="form-group text-left">
                <input type="hidden" name="id" id="id" value="<?php
                                                                if (isset($datos['data']['id'])) {
                                                                    print $datos['data']['id'];
                                                                } else {
                                                                    print "";
                                                                }
                                                                ?>">
                <?php
                if (isset($datos["baja"])) {
                ?>
                    <a href="<?php print RUTA; ?>admonProductos/bajaLogica/<?php print $datos['data']['id']; ?>" class="btn btn-danger">Borrar</a> <a href="<?php print RUTA; ?>admonProductos" class="btn btn-danger">regresar</a>
                    <p><b>Advertencia: Una vez borrado el registro no podrá recuperar la información.</b></p>
                <?php } else { ?>
                    <input type="submit" value="Enviar" class="btn btn-success">
                    <a href="<?php print RUTA; ?>admonProductos" class="btn btn-info">Volver</a>
                <?php } ?>
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