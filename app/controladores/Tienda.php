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
            //var_dump($sesion->getUsuario()); //para verificar que devuelve datos
            $datos = [
                "titulo" => "Bienvenido a MusicPro",
                "activo" => "cuerda",
                "menu" => true
            ];
            $this->vista("tiendaVista", $datos);
        } else {
            $datos = [
                "titulo" => "Bienvenido a MusicPro", //todo esto es provisorio para poder acceder a la tienda, se debe borrar
                "menu" => false
            ];
            $this->vista("tiendaVista", $datos);
            // header("location:" . RUTA);
        }
    }
}
