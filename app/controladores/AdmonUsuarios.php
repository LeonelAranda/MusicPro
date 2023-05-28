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
        $datos = [
            "titulo" => "Administrativo Usuarios",
            "menu" => false,
            "admon" => true,
            "data" => []
        ];
        $this->vista("admonUsuariosCaratulaVista", $datos);
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
                    # code...
                } else {
                    # code...
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

    public function cambio()
    {
        print "Usuarios admon cambio";
    }
}
