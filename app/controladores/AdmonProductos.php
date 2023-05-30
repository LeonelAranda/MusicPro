<?php
//Controlador para productos

class AdmonProductos extends Controlador
{
    private $modelo;

    function __construct()

    {

        $this->modelo = $this->modelo("AdmonProductosModelo");
    }

    public function caratula()
    {
        //creamos la sesion
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            //Leemos los datos de la tabla
            $data = $this->modelo->getProductos();

            //Leemos las llaves de tipo producto
            $llaves = $this->modelo->getLlaves("tipoProducto");

            //vista caratula
            $datos = [
                "titulo" => "Administrativo Productos",
                "menu" => false,
                "admon" => true,
                "data" => $data,
                "tipoProducto" => $llaves
            ];
            $this->vista("admonProductosCaratulaVista", $datos);
        } else {
            header("location:" . RUTA . "admon");
        }
    }

    public function alta()
    {
        //vista caratula
        $datos = [
            "titulo" => "Administrativo Productos Alta",
            "menu" => false,
            "admon" => true,
            "data" => []
        ];
        $this->vista("admonProductosAltaVista", $datos);
    }
}
