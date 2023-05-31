<?php
//Controlador para productos

class AdmonProductos extends Controlador
{
    private $modelo;

    function __construct()

    {

        $this->modelo = $this->modelo("AdmonProductosModelo");
    }

    public function caratula()
    {
        //creamos la sesion
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            //Leemos los datos de la tabla
            $data = $this->modelo->getProductos();

            //Leemos las llaves de tipo producto
            $llaves = $this->modelo->getLlaves("tipoProducto");

            //vista caratula
            $datos = [
                "titulo" => "Administrativo Productos",
                "menu" => false,
                "admon" => true,
                "data" => $data,
                "tipoProducto" => $llaves
            ];
            $this->vista("admonProductosCaratulaVista", $datos);
        } else {
            header("location:" . RUTA . "admon");
        }
    }

    public function alta()
    {
        //definir los arreglos
        $data = array();
        $errores = array();

        //Leemos las llaves del producto
        $llaves = $this->modelo->getLlaves("tipoProducto");

        //Leemos los estatus del producto
        $statusProducto = $this->modelo->getLlaves("statusProducto");

        //Leemos los catalogos del producto
        $catalogo = $this->modelo->getCatalogo();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //Recibimos la información PHP7
            $tipo = $_POST['tipo'] ?? "";
            $nombre = Valida::cadena($_POST['nombre'] ?? "");
            $marca = Valida::cadena($_POST['marca'] ?? "");
            $descripcion = Valida::cadena($_POST['content'] ?? "");
            $precio = Valida::numero($_POST['precio'] ?? "");
            $descuento =  Valida::numero($_POST['descuento'] ?? "0");
            $envio =  Valida::numero($_POST['envio'] ?? "0");
            $imagen = $_FILES['imagen']['name'];
            $imagen = Valida::archivo($imagen);
            $fecha = $_POST['fecha'] ?? "";
            $status = $_POST['status'] ?? "";


            //Validamos la informacion
            if (!is_numeric($precio)) {
                array_push($errores, "Ingrese un valor numerico.");
            }
            if (!is_numeric($descuento)) {
                array_push($errores, "Ingrese un valor numerico.");
            }
            if (!is_numeric($envio)) {
                array_push($errores, "Ingrese un valor numerico.");
            }
            if ($precio < $descuento) {
                array_push($errores, "El descuento no puede ser mayor al precio del producto.");
            }
            if (!Valida::fecha($fecha)) {
                array_push($errores, "La fecha es errónea o su formato es erróneo (AAAA-MM-DD).");
            } else if (Valida::fechaDif($fecha)) {
                array_push($errores, "La fecha no puede ser mayor a la fecha actual.");
            }

            if (Valida::archivoImagen($_FILES['imagen']['tmp_name'])) {
                //Cambiar nombre del archivo
                $imagen = Valida::archivo($nombre);
                $imagen = strtolower($imagen . ".jpg");

                //Subir el archivo
                if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                    //Copiamos el archivo temporal
                    copy($_FILES['imagen']['tmp_name'], "img/" . $imagen);
                    //Validar 240 px
                    Valida::imagen($imagen, 240);
                } else {
                    array_push($errores, "Error al subir el archivo.");
                }
            } else {
                array_push($errores, "El formato de la imagen no es aceptado.");
            }




            //Crear arreglo de datos
            $data = [

                "tipo" => $tipo,
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "marca" => $marca,
                "precio" => $precio,
                "descuento" => $descuento,
                "envio" => $envio,
                "fecha" => $fecha,
                "status" => $status,
                "imagen" => $imagen

            ];



            if (empty($errores)) {

                //Enviamos al modelo
                if ($this->modelo->altaProducto($data)) {
                }
            }
        }
        //vista alta
        $datos = [
            "titulo" => "Administrativo Productos Alta",
            "menu" => false,
            "admon" => true,
            "errores" => $errores,
            "tipoProducto" => $llaves,
            "statusProducto" => $statusProducto,
            "catalogo" => $catalogo,
            "data" => $data
        ];
        $this->vista("admonProductosAltaVista", $datos);
    }
}
