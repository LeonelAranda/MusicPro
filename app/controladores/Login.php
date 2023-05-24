<?php

#controlador login

class Login extends Controlador
{
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("LoginModelo");
    }

    function caratula()
    {
        $datos = [
            "titulo" => "Login",
            "menu" => false
        ];
        $this->vista("loginVista", $datos);
    }

    function olvido()
    {
        print "HOla";
    }

    function registro()
    {
        $datos = ["titulo" => "Registro usuario", "menu" => false];
        $this->vista("loginRegistroVista", $datos);
    }
}
