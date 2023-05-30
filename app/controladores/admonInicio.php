<?php

#controlador login

class AdmonInicio extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("AdmonInicioModelo");
    }

    function caratula()
    { //Crear sesion
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            $datos = [
                "titulo" => "Bienvenido a MusicPro",
                "menu" => false,
                "admon" => true,
                "data" => []
            ];
            $this->vista("AdmonInicioVista", $datos);
        } else {
            header("location:" . RUTA . "admon");
        }
    }
}
