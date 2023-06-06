<?php
//Login modelo
class cuerdaModelo
{
    private $db;

    function __construct()

    {
        $this->db = new MySQLdb();
    }
    public function getCuerda()
    {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=1";
        $data = $this->db->querySelect($sql);
        return $data;
    }
}
