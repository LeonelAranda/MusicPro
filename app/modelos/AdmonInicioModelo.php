<?php
//admon inicio modelo
class AdmonInicioModelo
{
    private $db;

    function __construct()

    {
        $this->db = new MySQLdb();
    }
}
