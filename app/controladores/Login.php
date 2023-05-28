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
        if (isset($_COOKIE["datos"])) {
            $datos_array = explode("|", $_COOKIE["datos"]);
            $usuario = $datos_array[0];
            $clave = $datos_array[1];
            $data = [
                "usuario" => $usuario,
                "clave" => $clave,
                "recordar" => "on"
            ];
        } else {
            $data = [];
        }
        $datos = [
            "titulo" => "Login",
            "menu" => false,
            "data" => $data
        ];
        $this->vista("loginVista", $datos);
    }

    function olvido()

    {
        $errores = array();
        $data = array();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            if ($email == "") {
                array_push($errores, "El email es requerido");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "El correo electrónico no es válido.");
            }
            if (count($errores) == 0) {
                if ($this->modelo->validaCorreo($email)) {
                    array_push($errores, "El correo electrónico no existe en la base de datos.");
                } else {
                    if (!$this->modelo->enviarCorreo($email)) {
                        $datos = [
                            "titulo" => "Cambio del clave de acceso",
                            "menu" => false,
                            "errores" => [],
                            "data" => [],
                            "subtitulo" => "Cambio de clave de acceso",
                            "texto" => "Se ha enviado un correo a <b>" . $email . "</b> para que puedas cambiar tu contraseña.",
                            "color" => "alert-success",
                            "url" => "login",
                            "colorBoton" => "btn-success",
                            "textoBoton" => "volver"
                        ];

                        $this->vista("mensajeVista", $datos);
                    } else {
                        $datos = [
                            "titulo" => "Error en el envío del correo",
                            "menu" => false,
                            "errores" => [],
                            "data" => [],
                            "subtitulo" => "Error en el envío del correo",
                            "texto" => "Existe un problema al enviar el correo electrónico.",
                            "color" => "alert-danger",
                            "url" => "login",
                            "colorBoton" => "btn-danger",
                            "textoBoton" => "volver"
                        ];

                        $this->vista("mensajeVista", $datos);
                    }
                }
            }
        } else {
            $datos = [
                "titulo" => "Olvido de la contraseña",
                "menu" => false,
                "errores" => [],
                "data" => [],
                "subtitulo" => "¿Olvidaste tu contraseña?",
            ];
            $this->vista("loginOlvidoVista", $datos);
        }

        if (count($errores)) {
            $datos = [
                "titulo" => "Olvido de clave de acceso",
                "menu" => false,
                "errores" => $errores,
                "subtitulo" => "¿Olvidaste tu contraseña?",
                "data" => []
            ];
            $this->vista("loginOlvidoVista", $datos);
        }
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
                    $datos = [
                        "titulo" => "Bienvenido a la tienda virtual",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Bienvenido a nuestra tienda",
                        "texto" => "Gracias por registrarte",
                        "color" => "alert-success",
                        "url" => "menu",
                        "colorBoton" => "btn-success",
                        "textoBoton" => "Iniciar"
                    ];

                    $this->vista("mensajeVista", $datos);
                } else {
                    $datos = [
                        "titulo" => "Error en el registro",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Error en el registro",
                        "texto" => "Existe un error en el registro, posiblemente su correo ya está en nuestra base de datos.",
                        "color" => "alert-danger",
                        "url" => "Login",
                        "colorBoton" => "btn-danger",
                        "textoBoton" => "volver"
                    ];

                    $this->vista("mensajeVista", $datos);
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
    function cambiaclave($data)
    {
        $errores  = array();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = isset($_POST["id"]) ? $_POST["id"] : "";
            $clave1 = isset($_POST["clave1"]) ? $_POST["clave1"] : "";
            $clave2 = isset($_POST["clave2"]) ? $_POST["clave2"] : "";
            //validaciones
            if ($clave1 == "") {
                array_push($errores, "La contraseña es requerida. ");
            }
            if ($clave2 == "") {
                array_push($errores, "La repetición de contraseña es requerida. ");
            }
            if ($clave1 != $clave2) {
                array_push($errores, "La contraseñas no coinciden.");
            }
            if (count($errores)) {
                //si hay errores
                $datos = [
                    "titulo" => "cambia contraseña",
                    "menu" => false,
                    "errores" => $errores,
                    "data" => $data
                ];
                $this->vista("loginCambiaclave", $datos);
            } else {
                //no hay errores
                if ($this->modelo->cambiarClaveAcceso($id, $clave1)) {
                    $datos = [
                        "titulo" => "Modificar la clave de acceso",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Modificar la clave de acceso",
                        "texto" => "La modificación de la contraseña de acceso fue exitosa.",
                        "color" => "alert-success",
                        "url" => "Login",
                        "colorBoton" => "btn-success",
                        "textoBoton" => "volver"
                    ];
                } else {
                    $datos = [
                        "titulo" => "Error al modificar la clave de acceso",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Error al modificar la clave de acceso",
                        "texto" => "error al modificar la clave de acceso.",
                        "color" => "alert-danger",
                        "url" => "Login",
                        "colorBoton" => "btn-danger",
                        "textoBoton" => "volver"
                    ];
                }
            }
        } else {
            $datos = [
                "titulo" => "cambia contraseña",
                "menu" => false,
                "data" => $data
            ];
            $this->vista("loginCambiaClave", $datos);
        }
    }
    function verifica()
    {
        $errores = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
            $clave = isset($_POST["clave"]) ? $_POST["clave"] : "";
            $recordar = isset($_POST["recordar"]) ? "on" : "off";
            $errores = $this->modelo->verificar($usuario, $clave);

            //para revisar entrara
            var_dump($usuario);
            var_dump($clave);
            //recuerdame

            $valor = $usuario . "|" . $clave;
            if ($recordar == "on") {
                $valor = $usuario . "|" . $clave;
                $fecha = time() + (60 * 60 * 24 * 7);
            } else {
                $fecha = time() - 1;
            }
            setcookie("datos", $valor, $fecha, RUTA);

            //
            $data = [
                "usuario" => $usuario,
                "clave" => $clave,
                "recordar" => $recordar
            ];
            //Validacion
            if (empty($errores)) {
                //Iniciamos sesion
                $data = $this->modelo->getUsuarioCorreo($usuario);
                $sesion = new Sesion();
                $sesion->iniciarLogin($data);
                //
                header("location:" . RUTA . "tienda");
            } else {
                $datos = [
                    "titulo" => "Login",
                    "menu" => false,
                    "errores" => $errores,
                    "data" => $data
                ];
                $this->vista("loginVista", $datos);
                //header("location:" . RUTA . "tienda");
            }
        }
    }
}
