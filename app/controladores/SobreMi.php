<?php

#controlador MusicPro

class SobreMi extends Controlador
{
    function caratula()
    {
        $sesion = new Sesion();
        if ($sesion->getLogin()) {

            $datos = [
                "titulo" => "Bienvenido a MusicPro",
                "activo" => "sobremi",
                "menu" => true
            ];
            $this->vista("sobremiVista", $datos);
        } else {
            header("location:" . RUTA);
        }
    }
}
