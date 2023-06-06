<?php

#controlador login

class Percusion extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("percusionModelo");
    }

    function caratula()
    {
        $sesion = new Sesion();
        if ($sesion->getLogin()) {
            //Leer los mas vendidos
            $data = $this->getPercusion();
            ///

            $datos = [
                "titulo" => "Instrumentos de percusión.",
                "activo" => "cuerda",
                "data" => $data,
                "activo" => "",
                "menu" => true
            ];
            $this->vista("percusionVista", $datos);
        } else {
            header("location:" . RUTA);
        }
    }

    public function getPercusion()
    {
        $data = array();
        return $this->modelo->getPercusion();
    }
}
