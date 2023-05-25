<?php

#controlador login

class Login extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("LoginModelo");
    }

    function caratula()
    {
        $datos = [
            "titulo" => "Login",
            "menu" => false
        ];
        $this->vista("loginVista", $datos);
    }

    function olvido()
    {
        print "HOla";
    }

    function registro()
    {
        $errores = array();
        $data = array();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
            $apellidoPaterno = isset($_POST["apellidoPaterno"]) ? $_POST["apellidoPaterno"] : "";
            $apellidoMaterno = isset($_POST["apellidoMaterno"]) ? $_POST["apellidoMaterno"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $clave1 = isset($_POST["clave1"]) ? $_POST["clave1"] : "";
            $clave2 = isset($_POST["clave2"]) ? $_POST["clave2"] : "";
            $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
            $ciudad = isset($_POST["ciudad"]) ? $_POST["ciudad"] : "";
            $region = isset($_POST["region"]) ? $_POST["region"] : "";
            $pais = isset($_POST["pais"]) ? $_POST["pais"] : "";
            $data =
                [
                    "nombre" => $nombre,
                    "apellidoPaterno" => $apellidoPaterno,
                    "apellidoMaterno" => $apellidoMaterno,
                    "email" => $email,
                    "clave1" => $clave1,
                    "clave2" => $clave2,
                    "direccion" => $direccion,
                    "ciudad" => $ciudad,
                    "region" => $region,
                    "pais" => $pais,

                ];


            //Validacion
            if ($nombre == "") {
                array_push($errores, "El nombre es requerido");
            }
            if ($apellidoPaterno == "") {
                array_push($errores, "El apellidoPaterno es requerido");
            }
            if ($email == "") {
                array_push($errores, "El email es requerido");
            }
            if ($clave1 == "") {
                array_push($errores, "La contraseña es requerida");
            }
            if ($clave2 == "") {
                array_push($errores, "La repetición de contraseña es requerida");
            }
            if ($direccion == "") {
                array_push($errores, "La dirección es requerida");
            }
            if ($ciudad == "") {
                array_push($errores, "La ciudad es requerida");
            }
            if ($region == "") {
                array_push($errores, "La region es requerida");
            }
            if ($pais == "") {
                array_push($errores, "El pais es requerido");
            }
            if ($clave1 != $clave2) {
                array_push($errores, "Las contraseñas no coinciden");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "El correo electrónico no es válido.");
            }
            if (count($errores) == 0) {
                $r = $this->modelo->insertarRegistro($data);
                if ($r) {
                    print "se insertó correctamente el registro";
                } else {
                    print "no se insertó el registro";
                }
            } else {
                $datos = [
                    "titulo" => "registro usuario",
                    "menu" => false,
                    "errores" => $errores,
                    "data" => $data
                ];
                $this->vista("loginRegistroVista", $datos);
            }
        } else {
            $datos = ["titulo" => "Registro usuario", "menu" => false];
            $this->vista("loginRegistroVista", $datos);
        }
    }
}
