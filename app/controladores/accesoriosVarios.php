<?php

#controlador Accesorios

class AccesoriosVarios extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("accesoriosModelo");
    }

    function caratula()
    {
        $sesion = new Sesion();
        if ($sesion->getLogin()) {
            //Leer los mas vendidos
            $data = $this->getAccesorios();
            ///

            $datos = [
                "titulo" => "Accesorios.",
                "activo" => "cuerda",
                "data" => $data,
                "activo" => "",
                "menu" => true
            ];
            $this->vista("accesoriosVista", $datos);
        } else {
            header("location:" . RUTA);
        }
    }

    public function getAccesorios()
    {
        $data = array();
        $data = $this->modelo->getAccesorios();
        return $data;
    }
}
