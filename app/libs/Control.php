<?php
#control maneja la url y lanza los procesos
#el primer elemento es el objeto o controlador
#el segundo elemento es el metodo o accion 
#y el tercero y posteriores son los paramewtros.

class Control
{
    protected $controlador = "Login";
    protected $metodo = "caratula";
    protected $parametros = [];

    function __construct()
    {
        $url = $this->separarURL();

        if ($url != "" && file_exists("../app/controladores/" . ucwords($url[0]) . ".php")) {
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        }
        //cargando la clase del controlador
        require_once("../app/controladores/" . ucwords($this->controlador) . ".php");
        //instanciando la clase controlador
        $this->controlador = new $this->controlador;

        if (isset($url[1])) {
            if (method_exists($this->controlador, $url[1])) {
                $this->metodo = $url[1];
                unset($url[1]);
            }
        }
        //
        $this->parametros = $url ? array_values($url) : [];
        call_user_func_array(
            [$this->controlador, $this->metodo],
            $this->parametros
        );
    }
    function separarURL()
    {
        $url = "";
        if (isset($_GET["url"])) {
            //eliminamos el caracter final si es que existe
            $url = rtrim($_GET["url"], "/");
            $url = rtrim($_GET["url"], "\\");
            //limpiamos caracteres no propiso de una url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //separamos
            $url = explode("/", $url);
        }
        return $url;
    }
}
