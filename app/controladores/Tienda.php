<?php

#controlador login

class Tienda extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("TiendaModelo");
    }

    function caratula()
    {
        $sesion = new Sesion();
        if ($sesion->getLogin()) {
            //Leer los mas vendidos
            $data = $this->getMasVendidos();
            ///
            ///leer los productos nuevos
            $nuevos = $this->getNuevos();


            $datos = [
                "titulo" => "Bienvenido a MusicPro",
                "data" => $data,
                "nuevos" => $nuevos,
                "activo" => "",
                "menu" => true
            ];
            $this->vista("tiendaVista", $datos);
        } else {
            $datos = [
                "titulo" => "Bienvenido a MusicPro", //todo esto es provisorio para poder acceder a la tienda, se debe borrar
                "menu" => false,

            ];
            $this->vista("tiendaVista", $datos);
            // header("location:" . RUTA);
        }
    }

    public function logout()
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            $session = new Sesion();
            $session->finalizarLogin();
        }
        header("location:" . RUTA);
    }

    public function getMasVendidos()
    {
        $data = array();
        require_once "AdmonProductos.php";
        $productos = new AdmonProductos();
        $data = $productos->getMasVendidos();
        unset($productos);
        return $data;
    }

    public function getNuevos()
    {
        $data = array();
        require_once "AdmonProductos.php";
        $productos = new AdmonProductos();
        $data = $productos->getNuevos();
        unset($productos);
        return $data;
    }
}
