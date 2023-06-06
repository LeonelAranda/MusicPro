<?php
//Login modelo
class BuscarModelo
{
    private $db;

    function __construct()

    {
        $this->db = new MySQLdb();
    }

    function getProductosBuscar($buscar)
    {
        $sql = "SELECT * FROM productos WHERE ";
        $sql .= "nombre LIKE '%" . $buscar . "%' OR ";
        $sql .= "marca LIKE '%" . $buscar . "%' OR ";
        $sql .= "tipo LIKE '%" . $buscar . "%'";

        //
        $data = $this->db->querySelect($sql);
        return $data;
    }
}
