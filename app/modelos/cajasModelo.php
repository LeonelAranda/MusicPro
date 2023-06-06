<?php
//Login modelo
class CajasModelo
{
    private $db;

    function __construct()

    {
        $this->db = new MySQLdb();
    }
    public function getCajas()
    {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=4";
        $data = $this->db->querySelect($sql);
        return $data;
    }
}
