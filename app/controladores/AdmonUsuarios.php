<?php
//Controlador usuarios admon

class AdmonUsuarios extends Controlador
{
    private $modelo;
    function __construct()
    {
        $this->modelo = $this->modelo("AdmonUsuariosModelo");
    }
    public function caratula()
    {
        //creamos la sesion
        $sesion = new Sesion();

        if ($sesion->getLogin()) {

            //Leemos los datos de la tabla
            $data = $this->modelo->getUsuarios();
            $datos = [
                "titulo" => "Administrativo Usuarios",
                "menu" => false,
                "admon" => true,
                "data" => $data
            ];
            $this->vista("admonUsuariosCaratulaVista", $datos);
        } else {
            header("location:" . RUTA . "admon");
        }
    }

    public function alta()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $errores = array();
            $data = array();
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
            $clave1 = isset($_POST['clave1']) ? $_POST['clave1'] : "";
            $clave2 = isset($_POST['clave2']) ? $_POST['clave2'] : "";
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";

            //Validacion
            if (empty($usuario)) {
                array_push($errores, "El usuario es requerido.");
            }
            if (empty($clave1)) {
                array_push($errores, "La contraseña es requerida.");
            }
            if (empty($clave2)) {
                array_push($errores, "La repetición de contraseña es requerida.");
            }
            if ($clave1 != $clave2) {
                array_push($errores, "Las contraseñas no coinciden.");
            }
            if (empty($nombre)) {
                array_push($errores, "El nombre de usuario es requerido.");
            }

            //Crear arreglo de datos
            $data = [
                "nombre" => $nombre,
                "clave1" => $clave1,
                "clave2" => $clave2,
                "usuario" => $usuario
            ];

            //verificamos que no haya errores
            if (empty($errores)) {
                if ($this->modelo->insertarDatos($data)) {
                    header("location:" . RUTA . "admonUsuarios");
                } else {
                    $datos = [
                        "titulo" => "Error en el registro",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Error en el registro",
                        "texto" => "Existe un error en el registro, posiblemente su correo ya está en nuestra base de datos.",
                        "color" => "alert-danger",
                        "url" => "admonInicio",
                        "colorBoton" => "btn-danger",
                        "textoBoton" => "volver"
                    ];
                    $this->vista("mensajeVista", $datos);
                }
            } else {
                $datos = [
                    "titulo" => "Administrativo Usuarios Alta",
                    "menu" => false,
                    "admon" => true,
                    "errores" => $errores,
                    "data" => $data

                ];
                $this->vista("admonUsuariosVista", $datos);
            }
        } else {
            $datos = [
                "titulo" => "Administrativo Usuarios Alta",
                "menu" => false,
                "admon" => true,
                "data" => []
            ];
            $this->vista("admonUsuariosVista", $datos);
        }
    }

    public function baja()
    {
        print "Usuarios admon baja";
    }

    public function cambio($id = "")
    { //Definiendo arreglos
        $errores = array();
        $data = array();

        //Recibiendo de la vista

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //Limpiando variable

            $id = isset($_POST['id']) ? $_POST['id'] : "";
            $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
            $clave1 = isset($_POST['clave1']) ? $_POST['clave1'] : "";
            $clave2 = isset($_POST['clave2']) ? $_POST['clave2'] : "";
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $status = isset($_POST['status']) ? $_POST['status'] : "";

            var_dump($_POST);

            //Validacion
            if (empty($correo)) {
                array_push($errores, "El usuario es requerido.");
            }

            if (empty($nombre)) {
                array_push($errores, "El nombre de usuario es requerido.");
            }

            if ($status == "void") {
                array_push($errores, "Selecciona el status del usuario.");
            }
            if (!empty($clave1) && !empty($clave2)) {
                if ($clave1 != $clave2) {
                    array_push($errores, "Las contraseñas no coinciden.");
                }
            }

            if (empty($errores)) {



                //crear arreglo de datos

                $data = [
                    "id" => $id,
                    "nombre" => $nombre,
                    "clave1" => $clave1,
                    "clave2" => $clave2,
                    "status" => $status,
                    "correo" => $correo,
                ];
                //Enviamos al modelo
                $errores = $this->modelo->modificaUsuario($data);

                //Validamos la insercion

                if (empty($errores)) {
                    header("location:" . RUTA . "admonUsuarios");
                }
            }
        }
        echo "Valor de \$id recibido mediante echo: " . $id;
        var_dump($id);

        $data = $this->modelo->getUsuarioId($id);
        $llaves = $this->modelo->getLlaves("admonStatus");
        $datos = [
            "titulo" => "Administrativo Usuarios Modifica",
            "menu" => false,
            "admon" => true,
            "status" => $llaves,
            "errores" => $errores,
            "data" => $data
        ];

        $this->vista("admonUsuariosModificaVista", $datos);
    }
}
