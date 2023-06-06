<?php

#controlador login

class Cajas extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("cajasModelo");
    }

    function caratula()
    {
        $sesion = new Sesion();
        if ($sesion->getLogin()) {
            //Leer los mas vendidos
            $data = $this->getCajas();
            ///

            $datos = [
                "titulo" => "Cajas.",
                "activo" => "cuerda",
                "data" => $data,
                "activo" => "",
                "menu" => true
            ];
            $this->vista("cajasVista", $datos);
        } else {
            header("location:" . RUTA);
        }
    }

    public function getCajas()
    {
        $data = array();
        $data = $this->modelo->getCajas();
        return $data;
    }
}
