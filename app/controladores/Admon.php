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
}
