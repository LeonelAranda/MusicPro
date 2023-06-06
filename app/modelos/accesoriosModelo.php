<?php
//Login modelo
class AccesoriosModelo
{
    private $db;

    function __construct()

    {
        $this->db = new MySQLdb();
    }
    public function getAccesorios()
    {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=5";
        $data = $this->db->querySelect($sql);
        return $data;
    }
}
