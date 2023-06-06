<?php
//Login modelo
class AmpliModelo
{
    private $db;

    function __construct()

    {
        $this->db = new MySQLdb();
    }
    public function getAmpli()
    {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=3";
        $data = $this->db->querySelect($sql);
        return $data;
    }
}
