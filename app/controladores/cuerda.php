<?php

#controlador login

class Cuerda extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("cuerdaModelo");
    }

    function caratula()
    {
        $sesion = new Sesion();
        if ($sesion->getLogin()) {
            //Leer los mas vendidos
            $data = $this->getCuerda();
            ///

            $datos = [
                "titulo" => "Instrumentos de cuerda.",
                "activo" => "cuerda",
                "data" => $data,
                "activo" => "",
                "menu" => true
            ];
            $this->vista("cuerdaVista", $datos);
        } else {
            header("location:" . RUTA);
        }
    }

    public function getCuerda()
    {
        $data = array();
        $data = $this->modelo->getCuerda();
        return $data;
    }
}
