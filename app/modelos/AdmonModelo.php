<?php
//Administrador Modelo

class AdmonModelo
{
    private $db;
    function __construct()
    {
        $this->db = new MySQLdb();
    }
}
