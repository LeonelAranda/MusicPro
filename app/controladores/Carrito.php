<?php

#controlador Carrito

class Carrito extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("CarritoModelo");
    }

    function caratula()
    {
        $sesion = new Sesion();
        if ($sesion->getLogin()) {
            //Leer los mas vendidos
            //$data = $this->getMasVendidos();
            ///
            ///leer los productos nuevos
            //$nuevos = $this->getNuevos();
            $datos = [
                "titulo" => "Bienvenido a MusicPro",
                "data" => $data,
                "nuevos" => $nuevos,
                "activo" => "",
                "menu" => true
            ];

            $this->vista("tiendaVista", $datos);
        } else {
            header("location:" . RUTA);
        }
    }

    public function agregaProducto($idProducto, $idUsuario)
    {
        $errores = array();
        if ($this->modelo->verificaProducto($idProducto, $idUsuario) == false) {
            //Añadir el registro
            if ($this->modelo->agregaProducto($idProducto, $idUsuario) == false) {
                array_push($errores, "Error al insertar el producto al carrito");
            }
        }
    }
    //Caratula
    //$this->caratula();
}
