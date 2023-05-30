<?php
//Controlador administrativo

class Admon extends Controlador
{
    private $modelo;
    function __construct()
    {
        $this->modelo = $this->modelo("AdmonModelo");
    }
    public function caratula()
    {
        $datos = [
            "titulo" => "Administrativo",
            "menu" => false,
            "data" => []
        ];
        $this->vista("admonVista", $datos);
    }
    public function verifica()
    { //inicio arreglos
        $errores = array();
        $data = array();

        //recibimos los datos de la vista
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //limpiamos datos
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
            $clave = isset($_POST['clave']) ? $_POST['clave'] : "";
            //validaciones
            if (empty($usuario)) {
                array_push($errores, "El usuario es requerido.");
            }
            if (empty($clave)) {
                array_push($errores, "La contraseña es requerida.");
            }

            //areglo DE data
            $data = [
                "usuario" => $usuario,
                "clave" => $clave
            ];

            //verificar errores

            if (empty($errores)) {

                //Ejecutar el query
                $errores = $this->modelo->verificarClave($data);
                //no hay errores
                if (empty($errores)) {
                    //creamos la sesion
                    $sesion = new Sesion();
                    $sesion->iniciarLogin($data);

                    //abrimos admonInicio

                    header("location:" . RUTA . "admonInicio");
                }
            }
        }
        //Enviamos errores a la vista
        $datos = [
            "titulo" => "Administrativo",
            "menu" => false,
            "admon" => true,
            "errores" => $errores,
            "data" => []
        ];
        $this->vista("admonVista", $datos);
    }
}
