<?php

#controlador login

class Amplificadores extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("ampliModelo");
    }

    function caratula()
    {
        $sesion = new Sesion();
        if ($sesion->getLogin()) {
            //Leer los mas vendidos
            $data = $this->getAmpli();
            ///

            $datos = [
                "titulo" => "Amplificadores.",
                "activo" => "cuerda",
                "data" => $data,
                "activo" => "",
                "menu" => true
            ];
            $this->vista("ampliVista", $datos);
        } else {
            header("location:" . RUTA);
        }
    }

    public function getAmpli()
    {
        $data = array();
        $data = $this->modelo->getAmpli();
        return $data;
    }
}
